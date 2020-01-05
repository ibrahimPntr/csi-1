<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisSemAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_sem_audiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('thesis_seminar_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();

            $table->foreign('thesis_seminar_id')->references('id')->on('thesis_seminars');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_sem_audiences');
    }
}
