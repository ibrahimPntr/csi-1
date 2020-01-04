<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumCompDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_comp_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curriculum_comp_standard_id');
            $table->string('code');
            $table->string('detail');
            $table->timestamps();

            $table->foreign('curriculum_comp_standard_id')->references('id')->on('curriculum_comp_standards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_comp_details');
    }
}
