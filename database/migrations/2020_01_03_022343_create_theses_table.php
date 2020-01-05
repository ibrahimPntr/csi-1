<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('thesis_id');
            $table->unsignedBigInteger('student_id');
            $table->text('title')->nullable();
            $table->text('abstract')->nullable();
            $table->date('start_at')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('thesis_id')->references('id')->on('thesis_topics');
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
        Schema::dropIfExists('theses');
    }
}
