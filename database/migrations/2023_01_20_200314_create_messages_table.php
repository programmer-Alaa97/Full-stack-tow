<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->longText('msg_content');
            // $table->string('sender_name');
            // $table->string('resaver_name');

            $table->bigInteger('sender_name')->unsigned();
            $table->foreign('sender_name')->references('id')->on('users')->onDUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('resaver_name')->unsigned();
            $table->foreign('resaver_name')->references('id')->on('users')->onDUpdate('cascade')->onDelete('cascade');

            $table->string('password');
            $table->string('photo');

            // $table->bigInteger( 'userID' )->unsigned();
            // $table->foreign('userID')->references('id')->on('users')->onDUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('messages');
    }
}
