<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->default('empty');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('user_type_id')->unsigned()->nullable();
            $table->boolean('is_active');
            $table->string('profile_img')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function($table) {
            $table->foreign('user_type_id')->references('id')->on('user_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
        $table->dropForeign('users_user_type_id_foreign');
        });

        Schema::dropIfExists('users');
    }
}
