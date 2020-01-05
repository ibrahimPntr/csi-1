<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpsWeekliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lps_weeklies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lps_id');
            $table->integer('week_of');
            $table->text('study_material');
            $table->text('teaching_methods')->nullable();
            $table->string('time_allocation')->nullable();
            $table->text('learning_exp')->nullable();
            $table->string('grade_percentage')->nullable();
            $table->text('grade_criteria')->nullable();
            $table->timestamps();

            $table->foreign('lps_id')->references('id')->on('lps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lps_weeklies');
    }
}
