<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable();
            $table->bigInteger('country_new_confimed')->nullable();
            $table->bigInteger('country_total_confimed')->nullable();
            $table->bigInteger('country_new_deaths')->nullable();
            $table->bigInteger('country_total_deaths')->nullable();
            $table->bigInteger('country_new_recovered')->nullable();
            $table->bigInteger('country_total_recovered')->nullable();
            $table->dateTime('date_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_statistics');
    }
}
