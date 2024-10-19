<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "buildingNum",
        "buildingName",
        "buildingType",
        "projectName",
        "city",
        "buildingIn",
        "ownerName",
        "ownerPhone",
        "agentName",
        "agentPhone",
        "agencyNum",
        "agencyDate",
        "mediatorName",
        "mediatorPhone",
        "Administrator",
        "AdministratorPhone",
        "contractType",
        "contractTime",
        "contractDetails",
        "contractValue",
        "contractStart",
        "contractEnd",
        "rentStart",
        "rentEnd",
        "rentValue",
        "rentTime",
        "contractPDF",
        "checkbox",
        "checkboxPDF",
        "textArea",
        "done",
        "type",
    ];

    public function dues()
    {
        return $this->hasMany(Due::class,'contractNum');
    }
    public function waters()
    {
        return $this->hasMany(Water::class,'contractNum');
    }
    public function electrics()
    {
        return $this->hasMany(Electric::class,'contractNum');
    }

    public function city_name()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function type_name()
    {
        return $this->belongsTo(Type::class, 'buildingType');
    }

    public function details()
    {
        return $this->belongsTo(Detail::class,'contractType');
    }

    public function time()
    {
        return $this->belongsTo(Time::class,'contractDetails');
    }
}
