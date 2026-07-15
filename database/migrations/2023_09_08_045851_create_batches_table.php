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
        Schema::create('batches', function (Blueprint $table) {
            $table->id('batchId');
            $table->string('batchName');
            $table->string('batchStartingYear');
            $table->string('batchEndingYear');
            $table->integer('status')->default(67);
            $table->timestamps();
        });
        
        DB::table('batches')->insert([
            'batchId' => 1,
            'batchName' => "2025-2026",
            'batchStartingYear' => "2025",
            'batchEndingYear' => "2026",
            'status' => 40
        ]);
        
        DB::table('batches')->insert([
            'batchId' => 2,
            'batchName' => "2026-2027",
            'batchStartingYear' => "2026",
            'batchEndingYear' => "2027",
            'status' => 67
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
};
