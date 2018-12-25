<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_details', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_job');
            $table->date('joining_date');
            $table->date('quit_date');
            $table->mediumText('jon_tilte');
            $table->mediumText('company_title');
            $table->longText('job_description');
            $table->integer('day_experience');
            $table->integer('job_location_city')->unsigned()->nullable();
            $table->integer('job_location_country')->unsigned()->nullable();
            $table->integer('job_location_state')->unsigned()->nullable();
            $table->integer('applicant_profiles_userid')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('experience_details', function($table) {
            $table->foreign('job_location_city')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('job_location_country')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('job_location_state')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('applicant_profiles_userid')->references('user_id')->on('applicant_profiles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('experience_details', function($table) {
            $table->dropForeign('experience_details_job_location_city_foreign');
            $table->dropForeign('experience_details_job_location_country_foreign');
            $table->dropForeign('experience_details_job_location_state_foreign');
            $table->dropForeign('experience_details_applicant_profiles_userid_foreign');
        });    
        Schema::dropIfExists('experience_details');
    }
}
