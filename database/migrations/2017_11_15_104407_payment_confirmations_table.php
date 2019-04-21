<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_confirmations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('trans_amount');
            $table->string('bill_ref_number')->nullable();
            $table->string('trans_type');
            $table->string('trans_id');
            $table->string('trans_time');
            $table->string('business_short_code');
            $table->string('invoice_no');
            $table->string('org_account_bal');
            $table->string('third_party_trans_id');
            $table->string('msisdn');
            $table->string('kyc_name');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
