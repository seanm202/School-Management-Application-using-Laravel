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
        Schema::create('attendences', function (Blueprint $table) {
            $table->id('attendanceDataId');
            $table->integer('yes_or_no')->default(NULL);
            $table->integer('userId')->default(NULL);
            $table->integer('userRole')->default(NULL);
            $table->date('todaysDate')->default(NULL);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendences');
    }
};
