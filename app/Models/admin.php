<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';
    protected $primaryKey = 'adminId';
    protected $attributes = [
        'notifications_Posted'=>0,
    ];
    protected $fillable=['notifications_Posted'];
}
