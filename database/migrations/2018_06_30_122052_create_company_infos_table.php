<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_info');
            $table->longText('company_description');
            $table->date('established_date');
            $table->string('address');
            $table->string('company_url');
            $table->integer('employer_profiles_id')->unsigned()->nullable();
            $table->timestamps();
        });
          Schema::table('company_infos', function($table) {
            $table->foreign('employer_profiles_id')->references('user_id')->on('employer_profiles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('company_infos', function($table) {
            $table->dropForeign('company_infos_employer_profiles_id_foreign');
        });
        Schema::dropIfExists('company_infos');
    }
}
