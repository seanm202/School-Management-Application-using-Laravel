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
        Schema::create('days', function (Blueprint $table) {
            $table->id('dayId');
            $table->string('dayName');
            $table->integer('status')->default(63);
            $table->timestamps();
        });
        
        DB::table('days')->insert([
            'dayId' => 1,
            'dayName' => "Monday",
            'status' => 63,
        ]);
        
        DB::table('days')->insert([
            'dayId' => 2,
            'dayName' => "Tuesday",
            'status' => 63,
        ]);
        
        DB::table('days')->insert([
            'dayId' => 3,
            'dayName' => "Wednesday",
            'status' => 63,
        ]);
        
        DB::table('days')->insert([
            'dayId' => 4,
            'dayName' => "Thursday",
            'status' => 63,
        ]);
        
        DB::table('days')->insert([
            'dayId' => 5,
            'dayName' => "Friday",
            'status' => 63,
        ]);
        
        DB::table('days')->insert([
            'dayId' => 6,
            'dayName' => "Saturday",
            'status' => 63,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('days');
    }
};
