<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpsWeeklyOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lps_weekly_outcomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lps_weekly_id');
            $table->unsignedBigInteger('lps_outcomes_id');
            $table->timestamps();

            $table->foreign('lps_weekly_id')->references('id')->on('lps_weeklies');
            $table->foreign('lps_outcomes_id')->references('id')->on('lps_outcomes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lps_weekly_outcomes');
    }
}
