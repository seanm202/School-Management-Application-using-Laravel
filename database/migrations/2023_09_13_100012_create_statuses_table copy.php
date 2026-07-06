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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id('statusId');
            $table->integer('statusForRoles');
            $table->string('statusName');
            $table->timestamps();
        });
        
        DB::table('statuses')->insert([
            'statusId' => 1,
            'statusForRoles' => 1,
            'statusName' => "Active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 2,
            'statusForRoles' => 1,
            'statusName' => "Inactive",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 3,
            'statusForRoles' => 3,
            'statusName' => "Current Batch",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 4,
            'statusForRoles' => 3,
            'statusName' => "Previous Batch",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 5,
            'statusForRoles' => 3,
            'statusName' => "Registered!",
        ]);
        

        DB::table('statuses')->insert([
            'statusId' => 6,
            'statusForRoles' => 3,
            'statusName' => "Classroom Assigned!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 7,
            'statusForRoles' => 3,
            'statusName' => "Subject Teacher Assigned!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 8,
            'statusForRoles' => 3,
            'statusName' => "Subject Mark List Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 9,
            'statusForRoles' => 3,
            'statusName' => "Subject Mark Added!",
        ]);
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
};
