<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Due extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "contractNum",
        "dueDate",
        "dueInstallment",
        "pay",
        "dueData",
        "duePdf",
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contractNum');
    }
}
