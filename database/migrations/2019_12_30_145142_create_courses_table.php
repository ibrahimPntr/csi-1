<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curriculum_id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('abbrev_name')->nullable();
            $table->string('foreign_name')->nullable();
            $table->string('abbrev_foreign_name')->nullable();
            $table->integer('credit');
            $table->integer('theory_credit')->default(0);
            $table->integer('lab_credit')->default(0);
            $table->integer('field_credit')->default(0);
            $table->integer('semester');
            $table->text('description')->nullable();
            $table->integer('primary')->default(1);
            $table->timestamps();

            $table->foreign('curriculum_id')->references('id')->on('curricula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
