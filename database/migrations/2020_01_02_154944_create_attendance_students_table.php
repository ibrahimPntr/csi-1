<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attendance_id');
            $table->unsignedBigInteger('course_selection_id');
            $table->integer('status')->default(0);
            $table->text('info')->nullable();
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

            $table->foreign('attendance_id')->references('id')->on('attendances');
            $table->foreign('course_selection_id')->references('id')->on('course_selections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_students');
    }
}
