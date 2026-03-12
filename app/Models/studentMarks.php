<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;
   protected $table = 'student_marks';
   protected $primaryKey = 'student_marksId';
   protected $fillable = [
       'userId',
           'studentId',
       'classRoomId',
       'subjectId',
       'marks',
   'status',
     'batchId'
   ];

}
