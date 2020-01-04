<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumEventResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_event_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curriculum_event_id');
            $table->text('result')->nullable();
            $table->string('file_result')->nullable();
            $table->timestamps();

            $table->foreign('curriculum_event_id')->references('id')->on('curriculum_events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_event_results');
    }
}
