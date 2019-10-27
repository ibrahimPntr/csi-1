<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerFunctionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_functionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lecturer_id');
            $table->bigInteger('functional_id');
            $table->date('start_date_at');
            $table->string('decree_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_functionals');
    }
}
