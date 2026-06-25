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
            $table->integer('status');
            $table->timestamps();
        });
        
        DB::table('batches')->insert([
            'batchId' => 1,
            'batchName' => "2025-2026",
            'batchStartingYear' => "2025",
            'batchEndingYear' => "2026",
            'status' => 1,
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
