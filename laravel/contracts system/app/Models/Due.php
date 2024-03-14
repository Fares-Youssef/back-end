<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    use HasFactory;
    protected $table='dues';
    protected $fillable=['contractNum','dueDate','dueInstallment','pay','dueData','duePdf'];
}
