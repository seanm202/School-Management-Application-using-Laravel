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
        Schema::create('priority', function (Blueprint $table) {
            $table->id('priorityId');
                $table->string('priorityName')->nullable();
                $table->integer('priorityValue')->nullable();
                $table->timestamps();
        });
        
        DB::table('priority')->insert([
            'priorityId' => 1,
            'priorityName' => "Extremely Important",
            'priorityValue' => 6
        ]);

        DB::table('priority')->insert([
            'priorityId' => 2,
            'priorityName' => "Very Important",
            'priorityValue' => 5
        ]);

        DB::table('priority')->insert([
            'priorityId' => 3,
            'priorityName' => "Important",
            'priorityValue' => 4
        ]);
        
        DB::table('priority')->insert([
            'priorityId' => 4,
            'priorityName' => "Moderately Important",
            'priorityValue' => 3
        ]);
        
        DB::table('priority')->insert([
            'priorityId' => 5,
            'priorityName' => "Necessarily Important",
            'priorityValue' => 2
        ]);
        
        DB::table('priority')->insert([
            'priorityId' => 6,
            'priorityName' => "Required",
            'priorityValue' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priority');
    }
};
