<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->increments('user_id')->unsigned();
            $table->string('first_name')->default('empty');
            $table->string('last_name')->default('empty');
            $table->string('contact_number')->default("empty");
            $table->boolean('is_notification_active')->default(0);
            $table->date('dob')->default(date("Y-m-d"));;
            $table->smallInteger('profile_completed')->default(0);
            $table->integer('gender_id')->default(1)->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('admin_profiles', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_profiles', function($table) {
            $table->dropForeign('admin_profiles_user_id_foreign');
            $table->dropForeign('admin_profiles_gender_id_foreign');
        });

        Schema::dropIfExists('admin_profiles');
    }
}
