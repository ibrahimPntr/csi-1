<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_logbooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('internship_id');
            $table->date('date')->nullable();
            $table->text('activity')->nullable();
            $table->text('notes')->nullable();
            //Masuk Geofence
            $table->string('model_in')->nullable();
            $table->string('manufacturer_in')->nullable();
            $table->string('osver_in')->nullable();
            $table->time('check_in_time')->nullable();
            $table->point('latlong_in')->nullable();
            //$table->double('long_in')->nullable();
            //Keluar Geofence
            $table->string('model_out')->nullable();
            $table->string('manufacturer_out')->nullable();
            $table->string('osver_out')->nullable();
            $table->time('check_out_time')->nullable();
            $table->point('latlong_out')->nullable();
            //$table->double('long_out')->nullable();
            $table->timestamps();

            $table->foreign('internship_id')->references('id')->on('internships');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_logbooks');
    }
}
