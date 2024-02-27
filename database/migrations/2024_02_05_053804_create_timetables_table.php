<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
          $table->id('timetableId');
          $table->integer('dayId')->default(NULL);
          $table->integer('hourId')->default(NULL);
          $table->integer('classroomId')->default(NULL);
          $table->integer('oddOrEven')->default(1);
          $table->integer('semesterId')->default(1);
          $table->integer('teacherId')->default(0);
          $table->integer('subjectId')->default(0);
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
        Schema::dropIfExists('timetables');
    }
};
