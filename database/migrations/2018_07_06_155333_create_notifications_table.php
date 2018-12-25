<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('post_job_id')->unsigned()->nullable();
            $table->integer('notification_type_id')->unsigned()->nullable();
            $table->date('expiry_date');
            $table->boolean('is_seen');
            $table->timestamps();
        });
         Schema::table('notifications', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('post_job_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('notification_type_id')->references('id')->on('notification_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('notifications', function($table) {
            $table->dropForeign('notifications_user_id_foreign');
            $table->dropForeign('notifications_post_job_id_foreign');
            $table->dropForeign('notifications_notification_type_id_foreign');
        });
        Schema::dropIfExists('notifications');
    }
}
