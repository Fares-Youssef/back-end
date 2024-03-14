<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'subNum',
        'locationName',
        'box',
        'room',
        'receipt',
        'food',
        'type',
        'value',
        'start',
        'chef',
        'signature',
    ];
}
