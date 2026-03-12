<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teachers';
    protected $primaryKey = 'teacherId';
    protected $attributes = [
        'status'=>1
    ];
    protected $fillable = [
        'userId',
        'teacherDetailId',
        'status',
          'batchId'
    ];
}
