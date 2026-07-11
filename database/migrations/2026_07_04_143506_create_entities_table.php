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
            $table->integer('entityForStatus');
            $table->timestamps();
        });
        
        DB::table('entities')->insert([
            'entityId' => 1,
            'entityName' => 'People',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 2,
            'entityName' => 'Admin',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 3,
            'entityName' => 'Teacher',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([ 
            'entityId' => 4,
            'entityName' => 'Student',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 5,
            'entityName' => 'ClassRoom',
            'entityForStatus' => 1,
        ]);

        DB::table('entities')->insert([
            'entityId' => 6,
            'entityName' => 'Subject',
            'entityForStatus' => 1,
        ]);
        
        
        
        DB::table('entities')->insert([
            'entityId' => 7,
            'entityName' => 'Attendance',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 8,
            'entityName' => 'Student - Marks',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 9,
            'entityName' => 'Subject - Teachers',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 10,
            'entityName' => 'Constants',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 11,
            'entityName' => 'Student Subject Attendance',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 12,
            'entityName' => 'Teacher Daily Allocation',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 13,
            'entityName' => 'Priority',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 14,
            'entityName' => 'Batch',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 15,
            'entityName' => 'Day',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 16,
            'entityName' => 'Not - People',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 17,
            'entityName' => 'Hour',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 18,
            'entityName' => 'Department',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 19,
            'entityName' => 'Grade',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 20,
            'entityName' => 'Role',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 21,
            'entityName' => 'Section',
            'entityForStatus' => 1,
        ]);
        
        DB::table('entities')->insert([
            'entityId' => 22,
            'entityName' => 'Semester',
            'entityForStatus' => 1,
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
