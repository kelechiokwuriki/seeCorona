<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_statistics', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('global_new_confirmed')->nullable();
            $table->bigInteger('global_total_confimed')->nullable();
            $table->bigInteger('global_new_deaths')->nullable();
            $table->bigInteger('global_total_deaths')->nullable();
            $table->bigInteger('global_new_recovered')->nullable();
            $table->bigInteger('global_total_recovered')->nullable();
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
        Schema::dropIfExists('global_statistics');
    }
}
