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
        Schema::create('subject_teacher_for_each_sections', function (Blueprint $table) {
            $table->id('subjectForSectionId');
            $table->integer('teacherId');
            $table->integer('classRoomId');
            $table->integer('subjectId');
            $table->integer('departmentId');
            $table->integer('semesterId');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('subject_teacher_for_each_sections');
    }
};
