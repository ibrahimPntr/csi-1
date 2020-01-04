<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpsCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lps_competencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curriculum_comp_detail_id');
            $table->unsignedBigInteger('lps_outcome_id');
            $table->timestamps();

            $table->foreign('curriculum_comp_detail_id')->references('id')->on('curriculum_comp_details');
            $table->foreign('lps_outcome_id')->references('id')->on('lps_outcomes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lps_competencies');
    }
}
