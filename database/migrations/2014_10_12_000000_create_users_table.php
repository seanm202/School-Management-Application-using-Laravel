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
     public $timestamps = false;
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');
            $table->string('name')->default(NULL);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(NULL);
            $table->integer('detailsId')->nullable();
            $table->string('phone')->nullable();
            $table->integer('role')->default(1);
            $table->integer('batchId')->default(NULL);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->rememberToken();
        });

         DB::table('users')->insert([
            'userId' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin1234'),
            'detailsId' => 1,
            'phone' => '9845632151',
            'role' => 3,
            'batchId' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
         DB::table('users')->insert([
            'userId' => 2,
            'name' => 'Teacher',
            'email' => 'teacher@teacher.com',
            'email_verified_at' => now(),
            'password' => bcrypt('teacher1234'),
            'detailsId' => 2,
            'phone' => '9845632151',
            'role' => 3,
            'batchId' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
         DB::table('users')->insert([
            'userId' => 3,
            'name' => 'Student',
            'email' => 'student@student.com',
            'email_verified_at' => now(),
            'password' => bcrypt('student1234'),
            'detailsId' => 3,
            'phone' => '9845632151',
            'role' => 4,
            'batchId' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'userId' => 4,
            'name' => 'Guest',
            'email' => 'guest@guest.com',
            'email_verified_at' => now(),
            'password' => bcrypt('guest1234'),
            'detailsId' => 4,
            'phone' => '9845632151',
            'role' => 1,
            'batchId' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
