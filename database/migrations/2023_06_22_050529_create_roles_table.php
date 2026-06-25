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
            $table->integer('batchId')->default(0);
            $table->timestamps();
        });

        DB::table('roles')->insert([
            'roleId' => 1,
            'roleName' => 'Admin',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 2,
            'roleName' => 'Teacher',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 3,
            'roleName' => 'Student',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 4,
            'roleName' => 'Guest',
            'status' => 1,
            'batchId' => 1
        ]);
        
        DB::table('roles')->insert([
            'roleId' => 5,
            'roleName' => 'New User',
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
        Schema::dropIfExists('roles');
    }
};
