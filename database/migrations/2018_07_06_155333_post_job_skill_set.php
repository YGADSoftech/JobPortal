<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostJobSkillSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_job_skill_set', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_set_id')->unsigned()->nullable();
            $table->integer('post_job_id')->unsigned()->nullable();
            $table->tinyInteger('skill_level');
        });
        Schema::table('post_job_skill_set', function($table) {
            $table->foreign('skill_set_id')->references('id')->on('skill_sets')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('post_job_id')->references('id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_job_skill_set', function($table) {
            $table->dropForeign('post_job_skill_set_skill_set_id_foreign');
            $table->dropForeign('post_job_skill_set_post_job_id_foreign');
        });
        Schema::dropIfExists('post_job_skill_set');
    }
}
