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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('teacherId');
            $table->integer('userId');
            $table->integer('teacherDetailId')->default(0);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
            $table->timestamps();
        });

        
        DB::table('teachers')->insert([
            'teacherId' => 1,
            'userId' => 2,
            'teacherDetailId' => 2,
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
        Schema::dropIfExists('teachers');
    }
};
