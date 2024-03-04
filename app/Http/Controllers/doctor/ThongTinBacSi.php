<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ThongTinBacSi extends DB
{
    public $data = [];
    public function ttbs()
    {
        $this->data['title'] = 'Thông tin bác sĩ';
        $user = DB::select('SELECT * FROM bacsis WHERE name > ?', [0]);
        return view('doctor.bacsi.thongtinbacsi', $this->data, compact('user'));
    }
}
