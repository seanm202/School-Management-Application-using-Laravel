<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
  use HasFactory;
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'priority';
  protected $primaryKey = 'priorityId';
  protected $attributes = [
      'priorityValue'=>3,
  ];
  protected $fillable = [
      'priorityId',
          'priorityValue',
      'priorityName',
  ];
}
