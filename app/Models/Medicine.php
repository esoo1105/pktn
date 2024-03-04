<?php

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'prescription_id',
        'tenthuoc',
        'donvi',
        'soluong',
        'gia',
        'cachdung',
        'thanhtien'
        
    ];
}
