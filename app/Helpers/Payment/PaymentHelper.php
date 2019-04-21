<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 2/7/18
 * Time: 9:28 AM
 */

namespace App\Helpers\Payment;

use App\PaymentConfirmation;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentHelper
{
    private $sms;

    public function __construct()
    {

    }

    private static function formatPhoneNumber($msisdn)
    {
        return $msisdn;
//        if(starts_with($msisdn,'+254')
//        return substr($msisdn,1);
    }

    public function process($input)
    {
        if ($input['trans_amount'] == 0)
            return null;

        if(!PaymentConfirmation::query()->where(['trans_id' => $input['trans_id']])->exists()){
            #payment confirmation
            $data = $input;

            // //Remove the statement below.
            // $data['kyc_name'] = ends_with($data['kyc_name'],'.New')?str_replace('.New','',$data['kyc_name']):$data['kyc_name'];

            // $phone = self::formatPhoneNumber($input['msisdn']);

            // $person = User::where('phone', $phone)->first();

            // if(!is_null($person)){
            //     $data['user_id'] = $person->id;
            //     $data['status'] = true;
            // }

            $mpesa = PaymentConfirmation::query()->create($data);

        }

        return null;
    }

}