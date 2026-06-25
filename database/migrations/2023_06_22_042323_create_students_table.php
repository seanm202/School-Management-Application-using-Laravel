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
        Schema::create('students', function (Blueprint $table) {
            $table->id('studentId');
            $table->integer('userId');
            $table->integer('studentDetailsId')->default(NULL);
            $table->integer('studentClassroom')->default(NULL);
            $table->integer('studentGrade')->default(NULL);
            $table->integer('studentSection')->default(NULL);
            $table->integer('studentSemester')->default(NULL);
            $table->integer('studentDepartmentId')->default(NULL);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
            $table->timestamps();
        });

        
        DB::table('students')->insert([
            'studentId' => 1,
            'userId' => 3,
            'studentDetailsId' => 3,
            'studentClassroom' => 1,
            'studentGrade' => 1,
            'studentSection' => 1,
            'studentSemester' => 1,
            'studentDepartmentId' => 1,
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
        Schema::dropIfExists('students');
    }
};
