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
        Schema::create('semesters', function (Blueprint $table) {
            $table->id('semesterId');
            $table->string('semesterName');
            $table->integer('status');
            $table->integer('batchId');
            $table->timestamps();
        });
        
        DB::table('semesters')->insert([
            'semesterId' => 1,
            'semesterName' => "Semester 1",
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('semesters')->insert([
            'semesterId' => 2,
            'semesterName' => "Semester 1",
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('semesters')->insert([
            'semesterId' => 3,
            'semesterName' => "Semester 2",
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('semesters')->insert([
            'semesterId' => 4,
            'semesterName' => "Semester 3",
            'status' => 1,
            'batchId' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
         Schema::dropIfExists('semesters');
     }
};
