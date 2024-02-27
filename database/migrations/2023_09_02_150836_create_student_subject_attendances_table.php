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
        Schema::create('student_subject_attendances', function (Blueprint $table) {
            $table->id('id');
            $table->integer('classRoomId');
            $table->integer('studentId');
            $table->date('date');
            $table->integer('teacherId');
            $table->integer('subjectId');
            $table->integer('dayId');
            $table->integer('hourId');
            $table->integer('presentOrAbsent');
            $table->integer('daily_Teacher_AllocationId');
            $table->integer('status');
            $table->integer('batchId');
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
        Schema::dropIfExists('student_subject_attendances');
    }
};
