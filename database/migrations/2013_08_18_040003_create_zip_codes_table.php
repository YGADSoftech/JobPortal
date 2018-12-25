<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zip_code');
            $table->integer('city_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('zip_codes', function($table) {
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('zip_codes', function($table) {
            $table->dropForeign('zip_codes_city_id_foreign');
        });
        Schema::dropIfExists('zip_codes');
    }
}
