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
        Schema::create('grades', function (Blueprint $table) {
            $table->id('gradeId');
            $table->string('grade')->default(NULL);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
            $table->timestamps();
        });
        DB::table('grades')->insert([
            'gradeId' => 1,
            'grade' => 'Registered',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('grades')->insert([
            'gradeId' => 2,
            'grade' => 'Standard 1',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('grades')->insert([
            'gradeId' => 3,
            'grade' => 'Standard 2',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('grades')->insert([
            'gradeId' => 4,
            'grade' => 'Standard 3',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('grades')->insert([
            'gradeId' => 5,
            'grade' => 'Standard 4',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('grades')->insert([
            'gradeId' => 6,
            'grade' => 'Standard 5',
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
        Schema::dropIfExists('grades');
    }
};
