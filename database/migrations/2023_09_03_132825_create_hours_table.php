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
        Schema::create('hours', function (Blueprint $table) {
            $table->id('hourId');
            $table->string('hourName');
            $table->time('hourStartingTime');
            $table->time('hourEndingTime');
            $table->integer('status')->default(64);
            $table->timestamps();
        });
        
        DB::table('hours')->insert([
            'hourId' => 1,
            'hourName' => "1st Hour",
            'hourStartingTime' => "08:00:00",
            'hourEndingTime' => "09:00:00",
            'status' => 64,
        ]);
        
        DB::table('hours')->insert([
            'hourId' => 2,
            'hourName' => "2nd Hour",
            'hourStartingTime' => "09:00:00",
            'hourEndingTime' => "10:00:00",
            'status' => 64,
        ]);
        
        DB::table('hours')->insert([
            'hourId' => 3,
            'hourName' => "3rd Hour",
            'hourStartingTime' => "10:00:00",
            'hourEndingTime' => "11:00:00",
            'status' => 64,
        ]);
        
        DB::table('hours')->insert([
            'hourId' => 4,
            'hourName' => "4th Hour",
            'hourStartingTime' => "11:00:00",
            'hourEndingTime' => "12:00:00",
            'status' => 64,
        ]);
        
        DB::table('hours')->insert([
            'hourId' => 5,
            'hourName' => "5th Hour",
            'hourStartingTime' => "12:00:00",
            'hourEndingTime' => "13:00:00",
            'status' => 64,
        ]);
        
        DB::table('hours')->insert([
            'hourId' => 6,
            'hourName' => "6th Hour",
            'hourStartingTime' => "13:00:00",
            'hourEndingTime' => "14:00:00",
            'status' => 64,
        ]);
        
        DB::table('hours')->insert([
            'hourId' => 7,
            'hourName' => "7th Hour",
            'hourStartingTime' => "14:00:00",
            'hourEndingTime' => "15:00:00",
            'status' => 64,
        ]);
        
        DB::table('hours')->insert([
            'hourId' => 8,
            'hourName' => "8th Hour",
            'hourStartingTime' => "15:00:00",
            'hourEndingTime' => "16:00:00",
            'status' => 64,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours');
    }
};
