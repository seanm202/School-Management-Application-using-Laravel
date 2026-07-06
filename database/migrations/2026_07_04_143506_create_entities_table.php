<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id('entityId');
            $table->string('entityName');
            $table->integer('statusForEntity');
            $table->timestamps();
        });
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 1,
            'entityName' => 'People',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 2,
            'entityName' => 'Admin',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 3,
            'entityName' => 'Teacher',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 4
            'entityName' => 'Student',
            'statusForEntity' => 1,
        ]);

        DB::table('statentitiesuses')->insert([
            'entityId' => 5,
            'entityName' => 'Department',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 6,
            'entityName' => 'Semester',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 7,
            'entityName' => 'Grade',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 8,
            'entityName' => 'Section',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 9,
            'entityName' => 'ClassRoom',
            'statusForEntity' => 1,
        ]);

        DB::table('statentitiesuses')->insert([
            'entityId' => 10,
            'entityName' => 'Subject',
            'statusForEntity' => 1,
        ]);
        
        
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 11,
            'entityName' => 'Details',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 12,
            'entityName' => 'Student - Marks',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 13,
            'entityName' => 'Subject - Teachers',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 14,
            'entityName' => 'Constants',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 15,
            'entityName' => 'Student Subject Attendance',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 16,
            'entityName' => 'Teacher Daily Allocation',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 17,
            'entityName' => 'Priority',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 18,
            'entityName' => 'Batch',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 19,
            'entityName' => 'Day',
            'statusForEntity' => 1,
        ]);
        
        DB::table('statentitiesuses')->insert([
            'entityId' => 20,
            'entityName' => 'Not - People',
            'statusForEntity' => 1,
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entities');
    }
};
