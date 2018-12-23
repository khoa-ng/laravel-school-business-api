<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 100);
            $table->string('lastname', 100);

            $table->integer('subjectId')->unsigned();
            $table->integer('teacherId')->unsigned();
            $table->integer('studentId')->unsigned();

            $table->timestamps();
        });

        // Foreign key
        Schema::table('classrooms', function (Blueprint $table) {
            $table->foreign('teacherId')->references('id')->on('teachers');
            $table->foreign('studentId')->references('id')->on('students');
            $table->foreign('subjectId')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
