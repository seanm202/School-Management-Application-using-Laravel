<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityFacility extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security_facilities';
    protected $primaryKey = 'securityId';
    protected $fillable = [
        'detail1' => '',
        'detail2' => '',
        'detail3' => '',
    ];
}
