<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('zip_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('job_locations', function($table) {
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('zip_id')->references('id')->on('zip_codes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_locations', function($table) {
            $table->dropForeign('job_locations_country_id_foreign');
            $table->dropForeign('job_locations_state_id_foreign');
            $table->dropForeign('job_locations_city_id_foreign');
            $table->dropForeign('job_locations_zip_id_foreign');
        });
        Schema::dropIfExists('job_locations');
    }
}
