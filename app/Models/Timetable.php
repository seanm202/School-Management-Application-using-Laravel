<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
  use HasFactory;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'timetables';
  protected $primaryKey = 'timetableId';
  protected $fillable = [
  'timetableId',
  'dayId',
      'hourId',
      'classroomId',
      'oddOrEven',
      'semesterId',
      'teacherId',
      'subjectId',
  ];
}
