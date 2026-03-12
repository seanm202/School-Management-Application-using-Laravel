<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyTeacherAllocation extends Model
{
    use HasFactory;

    protected $table = 'daily_Teacher_Allocation';
    protected $primaryKey = 'daily_Teacher_AllocationId';
    protected $fillable = [
    'classRoomId',
        'teacherId',
        'subjectId',
        'dayId',
        'hourId',
        'date',
        'status',
          'batchId',
          'subjectForSectionId'
    ];
}
