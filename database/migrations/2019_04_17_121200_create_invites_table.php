<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sname');
            $table->integer('groupid');
             $table->string('invitedgroup');
            $table->bigInteger('phne_number');
            $table->integer('role');
            $table->integer('confirmed')->default(0);
            $table->string('email');
            $table->string('invite_by');
           
            $table->longText('group_description');
            $table->string('token', 16)->unique();
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
        Schema::dropIfExists('invites');
    }
}
