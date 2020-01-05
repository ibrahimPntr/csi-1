<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_seminars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('thesis_proposal_id');
            $table->timestamp('registered_at');
            $table->integer('status')->default(0);
            $table->timestamp('seminar_at')->nullable();
            $table->string('file_report');
            $table->integer('recommendation')->nullable();
            $table->timestamps();

            $table->foreign('thesis_proposal_id')->references('id')->on('thesis_proposals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thesis_seminars');
    }
}
