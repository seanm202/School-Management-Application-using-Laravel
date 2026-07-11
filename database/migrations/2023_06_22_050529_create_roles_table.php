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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('roleId');
            $table->string('roleName')->default(NULL);
            $table->integer('status')->default(1);
            $table->integer('entityId')->default(0);
            $table->timestamps();
        });

        DB::table('roles')->insert([
            'roleId' => 1,
            'roleName' => 'Admin',
            'status' => 1,
            'entityId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 2,
            'roleName' => 'Teacher',
            'status' => 1,
            'entityId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 3,
            'roleName' => 'Student',
            'status' => 1,
            'entityId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 4,
            'roleName' => 'Guest',
            'status' => 1,
            'entityId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 5,
            'roleName' => 'New User',
            'status' => 1,
            'entityId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 6,
            'roleName' => 'Subject',
            'status' => 1,
            'entityId' => 2
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 7,
            'roleName' => 'Department',
            'status' => 1,
            'entityId' => 4
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 8,
            'roleName' => 'Semester',
            'status' => 1,
            'entityId' => 5
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 9,
            'roleName' => 'Grade',
            'status' => 1,
            'entityId' => 6
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 10,
            'roleName' => 'Section',
            'status' => 1,
            'entityId' => 7
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 11,
            'roleName' => 'Classroom',
            'status' => 1,
            'entityId' => 8
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 12,
            'roleName' => 'Details',
            'status' => 1,
            'entityId' => 9
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 13,
            'roleName' => 'Student Marks',
            'status' => 1,
            'entityId' => 10
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 14,
            'roleName' => 'Subject Teachers',
            'status' => 1,
            'entityId' => 11
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 15,
            'roleName' => 'Constants',
            'status' => 1,
            'entityId' => 12
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 16,
            'roleName' => 'Student Subject Attendance',
            'status' => 1,
            'entityId' => 13
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 17,
            'roleName' => 'Daily Teacher Allocation',
            'status' => 1,
            'entityId' => 14
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 18,
            'roleName' => 'Priority',
            'status' => 1,
            'entityId' => 15
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 19,
            'roleName' => 'Batch',
            'status' => 1,
            'entityId' => 16
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
