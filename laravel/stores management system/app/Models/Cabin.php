<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    use HasFactory;
    protected $fillable = ['store_id', 'name'];

    public function stores()
    {
        return $this->belongsTo(Store::class);
    }
}
