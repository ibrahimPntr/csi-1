<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('agency_id');
            $table->text('background')->nullable();
            $table->text('plan')->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->integer('status')->default(0);
            $table->string('file')->nullable();
            $table->string('notes')->nullable();
            $table->integer('type')->default(1);
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('internship_agencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_proposals');
    }
}
