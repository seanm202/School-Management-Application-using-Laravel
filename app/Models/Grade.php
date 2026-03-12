<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grades';
    protected $primaryKey = 'gradeId';
    protected $attributes = [
        'grade' => '',
          'batchId'=>0
    ];
    protected $fillable = ['grade'];
}
