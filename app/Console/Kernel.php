<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\User;
use App\Models\batch;
use App\Models\attendence;
use App\Http\Controllers\HoursController;
use App\Http\Controllers\AttendenceController;
use Illuminate\Support\Facades\DB;
use Auth;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {


/////Schedule Task 1
/////Create Attendance Slot for all users
 $schedule->call(function(){\App\Http\Controllers\AttendenceController::CreateAttendance();})->everyMinute();

 //Schedule Task 2
 /////////Create current hours
  $schedule->call(function(){\App\Http\Controllers\HoursController::setCurrentHour();})->everyMinute();
return;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
