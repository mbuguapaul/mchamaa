<?php

namespace App\Http\Controllers;

use App\Helpers\Payment\PaymentHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Gateway;
use Illuminate\Support\Str;

class GatewayAPI extends Controller
{	
	protected $incoming;
	protected $PASSWORD = 'bct';
	protected $OUTGOING_DIR_NAME='incoming/';
	protected $MPESA = 'mpesa/';
	protected $TRANS_ID = 0;
	protected $TRANS_DETAIL_ID = 0;
    /**
     * @var PaymentHelper
     */
    private $helper;

    /**
     * GatewayAPI constructor.
     * @param PaymentHelper $helper
     */
    public function __construct(PaymentHelper $helper) {
		 $this->TRANS_ID = rand(1, 1000);
	    $this->TRANS_DETAIL_ID = rand(1, 1000);
        $this->helper = $helper;
    }

	public function index()
	{
		
	}
    public function store()
    {
    	$request = Gateway\EnvayaSMS::get_request();

		header("Content-Type: {$request->get_response_type()}");

		if (!$request->is_validated($this->PASSWORD))
		{
		    header("HTTP/1.1 403 Forbidden");
		    error_log("Invalid password");
		    echo $request->render_error_response("Invalid password");
		    return;
		}

		$action = $request->get_action();

		switch ($action->type)
		{
		    case Gateway\EnvayaSMS::ACTION_INCOMING:
		        $events = array();
		        $type = strtoupper($action->message_type);
		        Log::info("MNET Received: {$type} from: {$action->from} message: {$action->message}");
		        if($action->from == 'MPESA' || Str::endsWith($action->from,'716551010')){
		            $parts = explode(" ", $action->message);
		            Log::info($parts);
                    $format = [
                        'trans_amount' => (int)preg_replace('/[^0-9\.0-9]/','', $parts[4]),
                        'bill_ref_number' => $parts[0],
                        'trans_type' => 'SMS',
                        'trans_id' => $parts[0],
                        'trans_time' => '?',
                        'business_short_code' => '0716551010',
                        'invoice_no' => 'invoice',
                        'org_account_bal' => '0',
                        'third_party_trans_id' => '?',
                        'msisdn' => preg_match("/[^+].[0-9]/",$parts[8]) ? $parts[8] : $parts[9],
                        'kyc_name' => $parts[6].' '.$parts[7],
                        'created_at' => Carbon::now()
                    ];
                    
                    $message ="confirmed, {$format['trans_amount']} received to Mchama account. Thank you. ";
                    app('App\Http\Controllers\PaymentProcessingController')->create($format['trans_amount'],$format['msisdn'],$format['bill_ref_number']);

                    $this->helper->process($format);

                    $sms = new Gateway\EnvayaSMS_OutgoingMessage();
                    $sms->id = uniqid();
                    $sms->to = $format['msisdn'];
                    $sms->message = $message." Receipt no: ".$format['bill_ref_number'];
                    $sms->type = Gateway\EnvayaSMS::MESSAGE_TYPE_SMS;
                    $sms->priority = 1;
                    $messages[] = $sms;

                    $events[] = new Gateway\EnvayaSMS_Event_Send($messages);
                }

                return response()->json(array(
                    "events"=>$events
                ));
		        
		    case Gateway\EnvayaSMS::ACTION_OUTGOING:
		  //       $messages = array();

				// $smses = Sms::where('status',0)->get();
		  //       foreach($smses as $_sms)
				// {
				// 	$sms = new Gateway\EnvayaSMS_OutgoingMessage();
				// 	$sms->id = $_sms->id;
				// 	$sms->to = $_sms->phone_number;
				// 	$sms->message = $_sms->sms_body;
				// 	$sms->type = Gateway\EnvayaSMS::MESSAGE_TYPE_SMS;
				// 	$sms->priority = 1;
				// 	$messages[] = $sms;
				// }
		  //       $events = array();

		  //       if ($messages)
		  //       {
		  //           $events[] = new Gateway\EnvayaSMS_Event_Send($messages);
		  //       }

		  //       echo $request->render_response($events);
		  //       return response()->json(array('events'=>null));
		        
		  //   case Gateway\EnvayaSMS::ACTION_SEND_STATUS:
		    
//		        $id = $action->id;
//
//		        error_log("message $id status: {$action->status}");
//
//		        try {
//		        	 // delete file with matching id
////				       if (preg_match('#^\w+$#', $id))
////				       {
////			            Storage::delete($this->OUTGOING_DIR_NAME.$id.'.json');
////			           }
//					if($sms = Sms::find($id))
//					{
//						$sms->status = 1;
//						$sms->save();
//					}
//		        } catch (\Exception $e) {
//		        	error_log("message not available for deletion".$e);
//		        }
		        //echo $request->render_response();
		        return response()->json(array('events'=>null));
		    case Gateway\EnvayaSMS::ACTION_DEVICE_STATUS:
		        error_log("device_status = {$action->status}");
		        echo $request->render_response();
		        return response()->json(array('events'=>null));;
		    case Gateway\EnvayaSMS::ACTION_TEST:
		        //echo $request->render_response();
		        return response()->json(array('events'=>null));;
		    default:
		        header("HTTP/1.1 404 Not Found");
		        echo $request->render_error_response("The server does not support the requested action.");
		        return;
		}
    }
}
