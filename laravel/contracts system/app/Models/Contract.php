<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = 'contracts';
    protected $fillable = [
        'buildingNum',
        'buildingName',
        'buildingType',
        'projectName',
        'city',
        "buildingIn",
        'ownerName',
        'ownerPhone',
        'agentName',
        'agentPhone',
        'agencyNum',
        'agencyDate',
        'mediatorName',
        'mediatorPhone',
        'Administrator',
        'AdministratorPhone',
        'contractType',
        'contractTime',
        'contractDetails',
        'contractValue',
        'contractStart',
        'contractEnd',
        'rentStart',
        'rentEnd',
        'rentValue',
        'rentTime',
        'contractPDF',
        'checkbox',
        'checkboxPDF',
        'textArea'
    ];
}
