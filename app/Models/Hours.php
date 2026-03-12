<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hours';
    protected $primaryKey = 'hourId';
    protected $fillable = [
      'hourName',
        'hourStartingTime',
          'hourEndingTime'
    ];
}
