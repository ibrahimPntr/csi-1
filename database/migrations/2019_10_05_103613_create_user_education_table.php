<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('education_level');
            $table->string('school_name');
            $table->string('dept')->nullable();
            $table->integer('year_start')->nullable();
            $table->integer('year_finish')->nullable();
            $table->integer('domestic')->nullable();
            $table->string('school_address')->nullable();
            $table->string('certificate_no')->nullable();
            $table->string('certificate_file')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_education');
    }
}
