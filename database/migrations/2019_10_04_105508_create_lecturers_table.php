<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('nik')->unique();
            $table->string('name');
            $table->string('nip')->nullable();
            $table->string('nidn')->nullable();
            $table->string('karpeg')->nullable();
            $table->string('npwp')->nullable();
            $table->integer('gender')->nullable(); //code: config/central/gender
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->bigInteger('department_id')->nullable(); //code: table/Department/id
            $table->string('photo')->nullable();
            $table->integer('marital_status')->nullable(); //code: config/central/marital_status
            $table->integer('religion')->nullable(); //code: config/central/religion
            $table->integer('association_type')->nullable();
            $table->timestamps();

            $table->primary('id');
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
