<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('research_schema_id')->nullable();
            $table->integer('start_at')->nullable();
            $table->integer('fund_amount')->nullable();
            $table->string('proposal_file')->nullable();
            $table->string('report_file')->nullable();
            $table->timestamps();

            $table->foreign('research_schema_id')->references('id')->on('research_schemas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researches');
    }
}
