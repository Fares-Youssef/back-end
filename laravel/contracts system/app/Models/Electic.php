<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electic extends Model
{
    use HasFactory;
    protected $table='electics';
    protected $fillable=['contractNum',"start","end","value","PDF"];
}
