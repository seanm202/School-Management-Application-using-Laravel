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
        Schema::create('sections', function (Blueprint $table) {
            $table->id('sectionId');
            $table->string('sectionName')->default(NULL);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
            $table->timestamps();
        });

        DB::table('sections')->insert([
            'sectionId' => 1,
            'sectionName' => 'Registered',
            'status' => 1,
            'batchId' => 1
        ]);


        DB::table('sections')->insert([
            'sectionId' => 2,
            'sectionName' => 'Section A',
            'status' => 1,
            'batchId' => 1
        ]);

        DB::table('sections')->insert([
            'sectionId' => 3,
            'sectionName' => 'Section B',
            'status' => 1,
            'batchId' => 1
        ]);
        

        DB::table('sections')->insert([
            'sectionId' => 4,
            'sectionName' => 'Section C',
            'status' => 1,
            'batchId' => 1
        ]);

        DB::table('sections')->insert([
            'sectionId' => 5,
            'sectionName' => 'Section D',
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
        Schema::dropIfExists('sections');
    }
};
