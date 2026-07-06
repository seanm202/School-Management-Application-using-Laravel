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
            $table->integer('statusForEntity');
            $table->string('statusName');
            $table->timestamps();
        });
        
        DB::table('statuses')->insert([
            'statusId' => 1,
            'statusForEntity' => 1,
            'statusName' => "Active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 2,
            'statusForEntity' => 1,
            'statusName' => "Inactive",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 3,
            'statusForEntity' => 4,
            'statusName' => "Current Batch",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 4,
            'statusForEntity' => 4,
            'statusName' => "Previous Batch",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 5,
            'statusForEntity' => 4,
            'statusName' => "Student registered!",
        ]);
        DB::table('statuses')->insert([
            'statusId' => 6,
            'statusForEntity' => 3,
            'statusName' => "Teacher registered!",
        ]);
        

        DB::table('statuses')->insert([
            'statusId' => 7,
            'statusForEntity' => 4,
            'statusName' => "Classroom assigned!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 8,
            'statusForEntity' => 10,
            'statusName' => "Subject created.
                             Subject teacher not assigned!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 9,
            'statusForEntity' => 10,
            'statusName' => "Subject Teacher Assigned!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 10,
            'statusForEntity' => 13,
            'statusName' => "Subject Mark List Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 11,
            'statusForEntity' => 13,
            'statusName' => "Subject Mark Added!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 12,
            'statusForEntity' => 6,
            'statusName' => "Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 13,
            'statusForEntity' => 7,
            'statusName' => "Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 14,
            'statusForEntity' => 8,
            'statusName' => "Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 15,
            'statusForEntity' => 9,
            'statusName' => "Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 16,
            'statusForEntity' => 9,
            'statusName' => "Class!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 17,
            'statusForEntity' => 9,
            'statusName' => "Created!Class Teacher Not Assigned!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 18,
            'statusForEntity' => 9,
            'statusName' => "Class Teacher Assigned!Daily Attendance table not created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' =>19,
            'statusForEntity' => 9,
            'statusName' => "Daily Attendance table created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' =>20,
            'statusForEntity' => 12,
            'statusName' => "Student marks table created!Default values added!",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' =>21,
            'statusForEntity' => 16,
            'statusName' => "Teacher Daily Allocation table created!",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' =>22,
            'statusForEntity' => 16,
            'statusName' => "Teacher Daily Allocation record submitted!",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 23,
            'statusForEntity' => 18,
            'statusName' => "Batch created!",
        ]);        
        
        DB::table('statuses')->insert([
            'statusId' => 24,
            'statusForEntity' => 1,
            'statusName' => "Account created!",
        ]);      
        
        DB::table('statuses')->insert([
            'statusId' => 25,
            'statusForEntity' => 19,
            'statusName' => "Day created!",
        ]);
          
        
        DB::table('statuses')->insert([
            'statusId' => 25,
            'statusForEntity' =>20,
            'statusName' => "Active!",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 25,
            'statusForEntity' =>20,
            'statusName' => "Inactive!",
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
