<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Out extends Model
{
    use HasFactory;
    protected $fillable = [
        'empId', 'empName', 'empNumId', 'region', 'city', 'collection',
        'building', 'apartmentNum', 'roomNum', 'status', 'housingDate', 'outDate', 'reason'
    ];
}
