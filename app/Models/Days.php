<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'days';
    protected $primaryKey = 'dayId';
    protected $fillable = [
      'dayId',
        'dayName',
    ];
}
