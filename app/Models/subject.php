<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subjects';
    protected $primaryKey = 'subjectId';
    protected $attributes = [
        'status'=>1,
    ];
    protected $fillable = [
        'departmentId',
            'semesterId',
        'subjectName',
        'subjectGrade',
        'subjectMaxMarks',
        'subjectTextName',
        'subjectCode',
        'torlab',
        'priority',
          'status',
            'batchId',
    ];
}
