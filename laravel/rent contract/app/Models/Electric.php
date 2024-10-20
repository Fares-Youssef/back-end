<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Electric extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['contractNum',"start","end","value","PDF"];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contractNum');
    }
}
