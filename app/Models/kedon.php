<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class kedon extends Model
{
    use HasFactory;

    public function kedon(){
        $kedonthuoc = DB::select('SELECT * FROM benhnhans n, bacsis b, thuocs t, kedonthuocs k 
        WHERE k.id_patient = n.id AND k.id_doctor = b.id AND k.id_medicine = t.id');
    }

    // hiển thị thông tin trên trang chủ
    public function danhsach(){
        $users = DB::table('benhnhans')->get();
         return $users;
     }

     public function getDetailDS($id){
        $users = DB::table('benhnhans')
        ->select('benhnhans.*')
        ->where('benhnhans.id', '=', $id)
        ->get();
         return $users;
     }

     public function getDetailBS($id){
        $users = DB::table('bacsis')
        ->select('bacsis.*')
        ->where('bacsis.id', '=', $id)
        ->get();
         return $users;
     }
 
}
