<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class In extends Model
{
    use HasFactory;
    protected $table='ins';
    protected $fillable=['empId','time','date'];
}
