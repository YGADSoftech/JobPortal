<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_1')->unsigned()->nullable();;
            $table->integer('user_2')->unsigned()->nullable();;
            $table->boolean('user_1_typing');
            $table->boolean('user_2_typing');
            $table->boolean('user_1_delete');
            $table->boolean('user_2_delete');
            $table->timestamps();
        });
         Schema::table('conversations', function($table) {
            $table->foreign('user_1')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_2')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('conversations', function($table) {
            $table->dropForeign('conversations_user_1_foreign');
            $table->dropForeign('conversations_user_2_foreign');
        });
        Schema::dropIfExists('conversations');
    }
}
