<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_targets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curriculum_id');
            $table->text('specific');
            $table->text('generic');
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
        Schema::dropIfExists('curriculum_targets');
    }
}
