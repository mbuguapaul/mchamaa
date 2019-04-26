<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentProcessingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_processings', function (Blueprint $table) {
            $table->increments('id');

             
             $table->string('amount');
            $table->bigInteger('phone_number');
             $table->string('ref_no');
              $table->integer('user_id');
               $table->foreign('user_id')->references('id')->on('users');
              $table->integer('group_id');
             $table->string('name')->nullable($value = true);
             

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
        Schema::dropIfExists('payment_processings');
    }
}
