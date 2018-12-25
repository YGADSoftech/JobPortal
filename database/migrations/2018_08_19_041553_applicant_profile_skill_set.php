<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicantProfileSkillSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_profile_skill_set', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_profile_user_id')->unsigned()->nullable();
            $table->integer('skill_ser_id')->unsigned()->nullable();
            $table->tinyInteger('skill_level');
        });
        Schema::table('applicant_profile_skill_set', function($table) {
            $table->foreign('applicant_profile_user_id')->references('user_id')->on('applicant_profiles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('skill_ser_id')->references('id')->on('skill_sets')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('applicant_profile_skill_set', function($table) {
            $table->dropForeign('applicant_profile_skill_set_applicant_profile_user_id_foreign');
            $table->dropForeign('applicant_profile_skill_set_skill_ser_id_foreign');
        });
        Schema::dropIfExists('applicant_profile_skill_set');
    }
}
