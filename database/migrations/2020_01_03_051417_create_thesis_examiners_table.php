<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisExaminersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_examiners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lecturer_id');
            $table->unsignedBigInteger('thesis_trial_id');
            $table->integer('position');
            $table->timestamps();

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('thesis_trial_id')->references('id')->on('thesis_trials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_examiners');
    }
}
