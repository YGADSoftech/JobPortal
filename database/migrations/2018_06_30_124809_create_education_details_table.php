<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('degree_name');
            $table->string('institute_name');
            $table->date('start_date');
            $table->date('completion_date');
            $table->float('pencerntage');
            $table->float('cgpa');
            $table->integer('applicant_profiles_userid')->unsigned()->nullable();
            $table->timestamps();
        });
          Schema::table('education_details', function($table) {
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
         Schema::table('education_details', function($table) {
            $table->dropForeign('education_details_applicant_profiles_userid_foreign');
        });
        Schema::dropIfExists('education_details');
    }
}
