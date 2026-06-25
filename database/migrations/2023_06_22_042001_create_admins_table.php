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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('adminId');
            $table->integer('userId');
            $table->integer('notifications_Posted')->default(0);
            $table->integer('adminDetailId')->default(0);
            $table->integer('status')->default(NULL);
            $table->integer('batchId')->default(NULL);
            $table->timestamps();
        });

        DB::table('admins')->insert([ 
            'adminId' => 1,
            'userId' => 1,
            'notifications_Posted' => 0,
            'adminDetailId' => 1,
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
        Schema::dropIfExists('admins');
    }
};
