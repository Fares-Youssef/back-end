<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Out extends Model
{
    use HasFactory;
    protected $table='outs';
    protected $fillable=['empId','time','date'];
}
