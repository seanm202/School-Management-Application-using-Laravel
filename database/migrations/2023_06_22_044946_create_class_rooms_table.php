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
        Schema::create('class_rooms', function (Blueprint $table) {
            $table->id('classroomDetailId');
            $table->string('grade')->default(NULL);
            $table->string('roomNo')->default(NULL);
            $table->string('section')->default(0);
            $table->integer('departmentId')->default(NULL);
            $table->integer('semester')->default(NULL);
            $table->string('classTeacher')->default(0);
            $table->string('description')->default(NULL);
            $table->integer('capacity')->default(0);
            $table->integer('classTimeTableId')->default(0);
            $table->integer('status')->default(1);
            $table->integer('batchId')->default(0);
            $table->timestamps();
        });
        
        DB::table('class_rooms')->insert([
            'classroomDetailId' => 1,
            'grade' => 1,
            'roomNo' => 0,
            'section' => 1,
            'departmentId' => 1,
            'semester' => 1,
            'classTeacher' => 1,
            'description' => 'Registered',
            'capacity' => 1,
            'classTimeTableId' => 1,
            'status' => 1,
            'batchId' => 1
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_rooms');
    }
};
