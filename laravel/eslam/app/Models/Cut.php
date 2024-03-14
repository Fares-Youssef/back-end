<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cut extends Model
{
    use HasFactory;
    protected $fillable = ["idNum", "clientName", 'color', 'type','code', 'name', 'count', 'weight', 'num', 'date'];
}
