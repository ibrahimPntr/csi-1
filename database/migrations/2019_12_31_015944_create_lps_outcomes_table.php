<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpsOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lps_outcomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lps_id');
            $table->text('description');
            $table->timestamps();

            $table->foreign('lps_id')->references('id')->on('lps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lps_outcomes');
    }
}
