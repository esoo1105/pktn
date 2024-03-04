<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LietKeDonThuoc extends DB
{
    public function lkdt()
    {
        $this->data['title'] = 'Liệt kê đơn thuốc';
         $kedonthuoc = DB::select('SELECT * FROM kedonthuocs');
        return view('doctor.bacsi.lietkedonthuoc' , $this->data, compact('kedonthuoc'));
    }
}
