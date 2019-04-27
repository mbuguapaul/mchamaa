<?php

namespace App\Http\Controllers;
use App\User;
use App\payment_processing;
use Illuminate\Http\Request;
use DB;
class PaymentProcessingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($trans_amount,$msisdn,$bill_ref_number)
    {

        // $member = User::where('phone', $msisdn);

$name = DB::table('users')->select('name')->where('phone', $msisdn)->first();
        $payment_processing = new payment_processing;
        
         $data=[];
         
        $data['users']=DB::SELECT('select * FROM users WHERE phone =?',[$msisdn]);

        foreach ($data['users'] as $user) {

            $data['group']=DB::SELECT('select * FROM group_members WHERE User_id =?',[$user->id]);
            
            foreach ($data['group'] as $groups) {
            
               $payment_processing->phone_number = $msisdn;
            $payment_processing->ref_no = $bill_ref_number;
            $payment_processing->name = $user->name;
            $payment_processing->user_id = $user->id;
            $payment_processing->group_id = $groups->group_id;

            $payment_processing->amount = $trans_amount;

            $payment_processing->save();

            $data['thegroup']=DB::SELECT('select * FROM groups WHERE id =?',[$groups->group_id]);

            foreach($data['thegroup'] as $thegroup){

             $worth=$thegroup->worth;
            
            $thegroup=$groups->id;

            $newworth=$worth + $trans_amount;

            DB::table('groups')
            ->where('id', $thegroup)
            ->update(['worth' => $newworth]);
            }

            }

         
    }
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\payment_processing  $payment_processing
     * @return \Illuminate\Http\Response
     */
    public function show(payment_processing $payment_processing)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment_processing  $payment_processing
     * @return \Illuminate\Http\Response
     */
    public function edit(payment_processing $payment_processing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment_processing  $payment_processing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment_processing $payment_processing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment_processing  $payment_processing
     * @return \Illuminate\Http\Response
     */
    public function destroy(payment_processing $payment_processing)
    {
        //
    }
}
