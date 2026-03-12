<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'class_rooms';
    protected $primaryKey = 'classroomDetailId';
    protected $fillable = [
        'grade',
        'roomNo',
        'section',
        'departmentId',
        'semester',
        'classTeacher',
        'description',
        'capacity',
        'classTimeTableId',
          'batchId'
    ];
}
