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
        Schema::create('student_marks', function (Blueprint $table) {
            $table->id('student_marksId');
            $table->integer('userId');
            $table->integer('studentId');
            $table->integer('classRoomId');
            $table->integer('subjectId');
            $table->integer('marks');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('student_marks');
    }
};
