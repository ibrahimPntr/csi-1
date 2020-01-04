<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisSemReviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_sem_reviewers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('thesis_seminar_id');
            $table->unsignedBigInteger('reviewer_id');
            $table->string('position')->nullable();
            $table->timestamps();

            $table->foreign('thesis_seminar_id')->references('id')->on('thesis_seminars');
            $table->foreign('reviewer_id')->references('id')->on('lecturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_sem_reviewers');
    }
}
