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
        Schema::create('departments', function (Blueprint $table) {
            $table->id('departmentId');
            $table->string('departmentName');
            $table->integer('status');
            $table->integer('batchId');
            $table->timestamps();
        });
        
        DB::table('departments')->insert([
            'departmentId' => 1,
            'departmentName' => "Registered",
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('departments')->insert([
            'departmentId' => 2,
            'departmentName' => "Mechanical Engineering",
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('departments')->insert([
            'departmentId' => 3,
            'departmentName' => "Electrical Engineering",
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('departments')->insert([
            'departmentId' => 4,
            'departmentName' => "Civil Engineering",
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
        Schema::dropIfExists('departments');
    }
};
