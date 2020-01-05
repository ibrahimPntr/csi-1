<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_selections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_semester_id');
            $table->unsignedBigInteger('classroom_id');
            $table->integer('status')->default(0);
            $table->double('score')->nullable();
            $table->string('grade')->nullable();
            $table->unsignedBigInteger('grade_by_id');
            $table->boolean('approved')->default(1);
            $table->timestamps();

            $table->foreign('student_semester_id')->references('id')->on('student_semesters');
            $table->foreign('classroom_id')->references('id')->on('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_selections');
    }
}
