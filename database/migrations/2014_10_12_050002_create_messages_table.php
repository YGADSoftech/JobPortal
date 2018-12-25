<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('message_sender_user')->unsigned()->nullable();
            $table->longText('message_text');
            $table->boolean('is_user_1_seen');
            $table->boolean('is_user_2_seen');
            $table->datetime('message_send_at');
            $table->integer('conversation_id')->unsigned()->nullable();
            $table->timestamps();
        });
         Schema::table('messages', function($table) {
            $table->foreign('message_sender_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('conversation_id')->references('id')->on('conversations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('messages', function($table) {
            $table->dropForeign('messages_message_sender_user_foreign');
            $table->dropForeign('messages_conversation_id_foreign');
        });
        Schema::dropIfExists('messages');
    }
}
