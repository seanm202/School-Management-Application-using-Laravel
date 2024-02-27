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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('subjectId');
                $table->integer('semesterId')->default(NULL);
                $table->integer('departmentId')->default(NULL);
            $table->string('subjectName')->default(NULL);
            $table->string('subjectGrade')->default(NULL);
            $table->string('subjectMaxMarks')->default(NULL);
            $table->string('subjectTextName')->default(NULL);
            $table->string('subjectCode')->default(NULL);
            $table->string('torlab')->default(NULL);
            $table->integer('priority')->default(3);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
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
        Schema::dropIfExists('subjects');
    }
};
