<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QuanLyLichKham extends DB
{
    public $data = [];
    public function qllk(){

        $this->data['title'] = 'Quản lý lịch khám';
        return view('doctor.bacsi.quanlylichkham', $this->data);

    }
}
