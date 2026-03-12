<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sections';
    protected $primaryKey = 'sectionId';
    protected $fillable = [
        'sectionName',
        'status',
          'batchId'
    ];
}
