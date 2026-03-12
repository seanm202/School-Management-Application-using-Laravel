<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attendences';
    protected $primaryKey = 'attendanceDataId';
    protected $fillable = [
    'yes_or_no',
    'userId',
        'userRole',
        'todaysDate',
        'status',
        'batchId'
    ];
    protected $attributes = [
      'batchId'=>0
];
}
