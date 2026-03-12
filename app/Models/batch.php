<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
  use HasFactory;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'batches';
  protected $primaryKey = 'batchId';
  protected $fillable = [
    'batchId',
    'batchName',
      'batchStartingYear',
      'batchEndingYear',
      'status',
  ];
}
