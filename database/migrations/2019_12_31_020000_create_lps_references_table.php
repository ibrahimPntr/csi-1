<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpsReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lps_references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lps_id');
            $table->text('detail');
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
        Schema::dropIfExists('lps_references');
    }
}
