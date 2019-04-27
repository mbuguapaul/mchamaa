<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
         
// 
            $table->string('group_name');
            $table->longText('objectives');
            $table->integer('worth')->default(0);
            $table->integer('amount');
            $table->integer('penalty')->nullable($value = true);
            $table->bigInteger('pay_number');
            $table->integer('created_by');
           $table->integer('period_of_contibution');
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
        Schema::dropIfExists('groups');
    }
}
