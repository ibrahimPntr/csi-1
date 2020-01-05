<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('thesis_id');
            $table->timestamp('datetime');
            $table->unsignedBigInteger('room_id');
            $table->string('grade')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('thesis_id')->references('id')->on('theses');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_proposals');
    }
}
