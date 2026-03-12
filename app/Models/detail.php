<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'details';
    protected $primaryKey = 'detailId';
    protected $fillable = [
    'firstname',
    'lastname',
        'age',
        'dob',
        'contactNumber',
        'alternateContactNumber',
        'roleId' ,
        'userId',
        'address',
        'bloodGroup',
        'identificationMark',
        'parentNumber',
        'homePhoneNumber',
        'fatherSpouseName',
        'motherName',
        'guardianName',
          'batchId',
    ];
}
