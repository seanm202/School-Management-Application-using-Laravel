<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';
    protected $primaryKey = 'studentId';
    protected $fillable = [
      'userId',
      'studentDetailsId',
        'studentGrade',
          'studentClassroom',
          'studentSection',
            'studentSemester',
            'studentDepartmentId',
            'batchId'
    ];
}
