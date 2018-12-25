<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->date('expire_job');
            $table->decimal('salary');
            $table->integer('job_type_id')->unsigned()->nullable();
            $table->integer('job_location_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('company_info_id')->unsigned()->nullable();
            $table->timestamps();
        });
          Schema::table('jobs', function($table) {
            $table->foreign('job_type_id')->references('id')->on('job_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('job_location_id')->references('id')->on('job_locations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('company_info_id')->references('id')->on('company_infos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function($table) {
            $table->dropForeign('jobs_job_type_id_foreign');
            $table->dropForeign('jobs_job_location_id_foreign');
            $table->dropForeign('jobs_user_id_foreign');
            $table->dropForeign('jobs_company_info_id_foreign');
        });
        Schema::dropIfExists('jobs');
    }
}
