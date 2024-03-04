<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LichSuKhamBenh extends DB
{
    public $data = [];
    public function lskb(){

        $this->data['title'] = 'Lịch sử khám bệnh';
        return view('doctor.bacsi.lichsukhambenh', $this->data);
    }
}
