<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('internship_proposal_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('status')->default(0);
            $table->string('field')->nullable();
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->text('title')->nullable();
            $table->unsignedBigInteger('advisor_id')->nullable();
            $table->string('field_advisor_name')->nullable();
            $table->string('field_advisor_no')->nullable();
            $table->string('field_advisor_phone')->nullable();
            $table->string('field_advisor_email')->nullable();
            $table->date('seminar_date')->nullable();
            $table->time('seminar_time')->nullable();
            $table->unsignedBigInteger('seminar_room_id')->nullable();
            $table->string('grade')->nullable();
            $table->string('file_report_receipt')->nullable();
            $table->string('file_field_grade')->nullable();
            $table->string('file_logbook')->nullable();
            $table->string('file_seminar_attendance')->nullable();
            $table->string('file_seminar_off_report')->nullable();
            $table->string('file_report')->nullable();
            $table->string('file_certificate')->nullable();
            $table->timestamps();

            $table->foreign('internship_proposal_id')->references('id')->on('internship_proposals');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('advisor_id')->references('id')->on('lecturers');
            $table->foreign('seminar_room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}
