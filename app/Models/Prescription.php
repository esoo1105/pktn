<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'ten_doctor',
        'ten_patient',
        'ngaykham',
        'hentaikham',
    ];
}
