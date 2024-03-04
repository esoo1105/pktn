<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TrangChu extends DB
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'Trang chủ';
        $index = DB::select('SELECT * FROM benhnhans WHERE MA_BN > ?', [0]);
        //$user = DB::select('SELECT * FROM benhnhans');
        return view('doctor.index', $this->data, compact('index'));
    }
}
