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
        Schema::create('details', function (Blueprint $table) {
            $table->id('detailId');
            $table->string('sal')->default('Mr./Ms.');
            $table->string('firstname')->default(NULL);
            $table->string('lastname')->default(NULL);
            $table->integer('age')->default(NULL);
            $table->date('dob')->default(NULL);
            $table->string('contactNumber')->nullable();
            $table->string('alternateContactNumber')->nullable();
            $table->integer('roleId');
            $table->integer('userId');
            $table->string('address')->default(0);
            $table->string('bloodGroup')->default(0);
            $table->string('identificationMark')->default(NULL);
            $table->string('parentNumber')->nullable();
            $table->string('homePhoneNumber')->nullable();
            $table->string('fatherSpouseName')->default(0);
            $table->string('motherName')->default(NULL);
            $table->string('guardianName')->default(NULL);
            $table->integer('status')->default(1);
            $table->integer('batchId')->default(0);
            $table->timestamps();
        });
        
        DB::table('details')->insert([
            'detailId' => 1,
            'firstname' => 'Admin',
            'lastname' => 'Jr.',
            'age' => 25,
            'dob' => "2001-01-01",
            'contactNumber' => '1234567893',
            'alternateContactNumber' => '9874563652',
            'roleId' => 1,
            'userId' => 1,
            'address' => "45, Main Street, Tudor City",
            'bloodGroup' => 'A +ve',
            'identificationMark' => 'None',
            'parentNumber' => '9456231212',
            'homePhoneNumber' => '6541239541',
            'fatherSpouseName' => 'Admin Sr.',
            'motherName' => 'Admin Mother',
            'guardianName' => 'Admin Sr.',
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('details')->insert([
            'detailId' => 2,
            'firstname' => 'Teacher',
            'lastname' => 'Jr.',
            'age' => 25,
            'dob' => "2001-01-01",
            'contactNumber' => '1234567893',
            'alternateContactNumber' => '9874563652',
            'roleId' => 2,
            'userId' => 2,
            'address' => "45, Fun Street, Day City",
            'bloodGroup' => 'A +ve',
            'identificationMark' => 'None',
            'parentNumber' => '9456231212',
            'homePhoneNumber' => '6541239541',
            'fatherSpouseName' => 'Teacher Sr.',
            'motherName' => 'Teacher Mother',
            'guardianName' => 'Teacher Sr.',
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('details')->insert([
            'detailId' => 3,
            'firstname' => 'Student',
            'lastname' => 'Jr.',
            'age' => 20,
            'dob' => "2001-01-01",
            'contactNumber' => '1234567893',
            'alternateContactNumber' => '9874563652',
            'roleId' => 3,
            'userId' => 3,
            'address' => "45, Hola Street, Nehru City",
            'bloodGroup' => 'A +ve',
            'identificationMark' => 'None',
            'parentNumber' => '9456231212',
            'homePhoneNumber' => '6541239541',
            'fatherSpouseName' => 'Student Sr.',
            'motherName' => 'Student Mother',
            'guardianName' => 'Student Sr.',
            'status' => 1,
            'batchId' => 1,
        ]);
        
        DB::table('details')->insert([
            'detailId' => 4,
            'firstname' => 'Guest',
            'lastname' => 'Jr.',
            'age' => 20,
            'dob' => "2001-11-21",
            'contactNumber' => '1234567893',
            'alternateContactNumber' => '9874563652',
            'roleId' => 4,
            'userId' => 4,
            'address' => "45, Guest Street, Nehru City",
            'bloodGroup' => 'A +ve',
            'identificationMark' => 'None',
            'parentNumber' => '9456231212',
            'homePhoneNumber' => '6541239541',
            'fatherSpouseName' => 'Guest Sr.',
            'motherName' => 'Guest Mother',
            'guardianName' => 'Guest Sr.',
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
        Schema::dropIfExists('details');
    }
};
