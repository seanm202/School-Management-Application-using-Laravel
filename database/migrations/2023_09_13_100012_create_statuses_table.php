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
            'statusName' => "Registered",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 2,
            'statusForEntity' => 1,
            'statusName' => "Created",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 3,
            'statusForEntity' => 1,
            'statusName' => "Active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 4,
            'statusForEntity' => 1,
            'statusName' => "Inactive",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 5,
            'statusForEntity' => 1,
            'statusName' => "Suspended",
        ]);
        DB::table('statuses')->insert([
            'statusId' => 6,
            'statusForEntity' => 1,
            'statusName' => "Deleted",
        ]);
        

        DB::table('statuses')->insert([
            'statusId' => 7,
            'statusForEntity' => 1,
            'statusName' => "Flagged",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 8,
            'statusForEntity' => 2,
            'statusName' => "Registered",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 9,
            'statusForEntity' => 2,
            'statusName' => "Created",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 10,
            'statusForEntity' => 2,
            'statusName' => "Active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 11,
            'statusForEntity' => 2,
            'statusName' => "Inactive",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 12,
            'statusForEntity' => 2,
            'statusName' => "Suspended",
        ]);
        DB::table('statuses')->insert([
            'statusId' => 13,
            'statusForEntity' => 2,
            'statusName' => "Deleted",
        ]);
        

        DB::table('statuses')->insert([
            'statusId' => 14,
            'statusForEntity' => 2,
            'statusName' => "Flagged",
        ]);

        // 
        // 
        // 

        
        
        DB::table('statuses')->insert([
            'statusId' => 15,
            'statusForEntity' => 3,
            'statusName' => "Registered",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 16,
            'statusForEntity' => 3,
            'statusName' => "Created",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 17,
            'statusForEntity' => 3,
            'statusName' => "Active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 18,
            'statusForEntity' => 3,
            'statusName' => "Inactive",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 19,
            'statusForEntity' => 3,
            'statusName' => "Suspended",
        ]);
        DB::table('statuses')->insert([
            'statusId' => 20,
            'statusForEntity' => 3,
            'statusName' => "Deleted",
        ]);
        

        DB::table('statuses')->insert([
            'statusId' => 21,
            'statusForEntity' => 3,
            'statusName' => "Flagged",
        ]);

        // 
        // 
        // 
        
        
        DB::table('statuses')->insert([
            'statusId' => 22,
            'statusForEntity' => 4,
            'statusName' => "Registered",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 23,
            'statusForEntity' => 4,
            'statusName' => "Created",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 24,
            'statusForEntity' => 4,
            'statusName' => "Active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 25,
            'statusForEntity' => 4,
            'statusName' => "Inactive",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 26,
            'statusForEntity' => 4,
            'statusName' => "Suspended",
        ]);
        DB::table('statuses')->insert([
            'statusId' => 27,
            'statusForEntity' => 4,
            'statusName' => "Deleted",
        ]);
        

        DB::table('statuses')->insert([
            'statusId' => 28,
            'statusForEntity' => 4,
            'statusName' => "Flagged",
        ]);



        DB::table('statuses')->insert([
            'statusId' => 29,
            'statusForEntity' => 4,
            'statusName' => "Assigned to a classroom",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 30,
            'statusForEntity' => 4,
            'statusName' => "Not added to attendance table",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 31,
            'statusForEntity' => 4,
            'statusName' => "Marklist not created",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 32,
            'statusForEntity' => 4,
            'statusName' => "Absent",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 33,
            'statusForEntity' => 4,
            'statusName' => "On leave",
        ]);

// 
// 
// 
// 

        DB::table('statuses')->insert([
            'statusId' => 34,
            'statusForEntity' => 5,
            'statusName' => "Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 35,
            'statusForEntity' => 5,
            'statusName' => "Active",
        ]);

        DB::table('statuses')->insert([
            'statusId' =>36,
            'statusForEntity' => 5,
            'statusName' => "Inactive!",
        ]);

        // 
        // 
        // 
        // 
        DB::table('statuses')->insert([
            'statusId' => 37,
            'statusForEntity' => 6,
            'statusName' => "Created!",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 38,
            'statusForEntity' => 6,
            'statusName' => "Active",
        ]);

        DB::table('statuses')->insert([
            'statusId' =>39,
            'statusForEntity' => 6,
            'statusName' => "Inactive!",
        ]);



        // 
        // 
        // 
        // 

        DB::table('statuses')->insert([
            'statusId' =>40,
            'statusForEntity' => 14,
            'statusName' => "Batch Assigned CURRENT status",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' =>41,
            'statusForEntity' => 14,
            'statusName' => "Batch removed CURRENT status",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 42,
            'statusForEntity' => 5,
            'statusName' => "Classroom not assigned Room No",
        ]);        
        
        DB::table('statuses')->insert([
            'statusId' => 43,
            'statusForEntity' => 5,
            'statusName' => "Classroom not assigned section",
        ]);      
        
        DB::table('statuses')->insert([
            'statusId' => 44,
            'statusForEntity' => 5,
            'statusName' => "Classroom not assigned Grade",
        ]);
          
        
        DB::table('statuses')->insert([
            'statusId' => 45,
            'statusForEntity' =>5,
            'statusName' => "Classroom not assigned Semester",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 46,
            'statusForEntity' =>5,
            'statusName' => "Classroom not assigned Department",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 47,
            'statusForEntity' =>5,
            'statusName' => "Classroom not assigned Class Teacher",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 48,
            'statusForEntity' =>7,
            'statusName' => "Classroom daily attendance list not generated",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 49,
            'statusForEntity' =>7,
            'statusName' => "Attendance details not submitted",
        ]);
        

        
        DB::table('statuses')->insert([
            'statusId' => 50,
            'statusForEntity' =>7,
            'statusName' => "Daily attendance table not generated for student",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 51,
            'statusForEntity' =>7,
            'statusName' => "Daily teacher/staff attendance list not generated",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 52,
            'statusForEntity' =>8,
            'statusName' => "Student marklist table not generated",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 53,
            'statusForEntity' =>8,
            'statusName' => "Student marklist table generated",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 54,
            'statusForEntity' =>8,
            'statusName' => "Student marklist table filled and submitted",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 55,
            'statusForEntity' =>11,
            'statusName' => "Student subjectwise attendance table not generated",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 56,
            'statusForEntity' =>11,
            'statusName' => "Student subjectwise attendance table generated",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 57,
            'statusForEntity' =>11,
            'statusName' => "Student subjectwise attendance table filled and submitted",
        ]);
        
        
        DB::table('statuses')->insert([
            'statusId' => 58,
            'statusForEntity' =>3,
            'statusName' => "Teacher assigned to each classoom",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 59,
            'statusForEntity' =>9,
            'statusName' => "Subject teachers not assigned to each classes.",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 60,
            'statusForEntity' =>4,
            'statusName' => "Student details not filled completely",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 61,
            'statusForEntity' =>3,
            'statusName' => "Teacher details not filled completely",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 62,
            'statusForEntity' =>2,
            'statusName' => "Admin details not filled completely",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 63,
            'statusForEntity' =>15,
            'statusName' => "Day active",
        ]);

        DB::table('statuses')->insert([
            'statusId' => 64,
            'statusForEntity' =>17,
            'statusName' => "Hour active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 65,
            'statusForEntity' =>7,
            'statusName' => "Attendance details created",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 66,
            'statusForEntity' =>7,
            'statusName' => "Attendance details submitted",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' =>67,
            'statusForEntity' => 14,
            'statusName' => "Batch active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 68,
            'statusForEntity' =>7,
            'statusName' => "Daily teacher/staff attendance list generated",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 69,
            'statusForEntity' =>18,
            'statusName' => "Department active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 70,
            'statusForEntity' =>19,
            'statusName' => "Grade active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 71,
            'statusForEntity' =>20,
            'statusName' => "Role active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 72,
            'statusForEntity' =>21,
            'statusName' => "Section active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 73,
            'statusForEntity' =>22,
            'statusName' => "Semester active",
        ]);
        
        DB::table('statuses')->insert([
            'statusId' => 74,
            'statusForEntity' =>7,
            'statusName' => "Daily teacher/staff attendance list deleted.",
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
