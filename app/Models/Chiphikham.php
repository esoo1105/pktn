<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Chiphikham extends Model
{
    use HasFactory;

    
   /* 
    Dùng hiển thị thông tin cho các giao diện Thu phí
    */
    public function getAllTable($filters = [], $keywords = null){
        $users = DB::table('kedonthuocs')
        ->select('benhnhans.*', 'kedonthuocs.*')
        ->join('benhnhans','benhnhans.id' , '=', 'kedonthuocs.id_patient' );

            // dùng để lọc thông tin 
            if(!empty($filters)){
                $users = $users->where($filters);
            }
    
            // dùng để tìm kiếm bằng từ khóa
            if(!empty($keywords)){
                $users = $users->where(function($query) use ($keywords){
                    $query->orWhere('name', 'like', '%'.$keywords.'%');
                    $query->orWhere('email', 'like', '%'.$keywords.'%');
                    $query->orWhere('phone', 'like', '%'.$keywords.'%');
    
                });
            }

            $users = $users->get();
        
        return $users;
     }



    public function getDetail($id){
        $users = DB::table('kedonthuocs')
        ->join('benhnhans','benhnhans.id' , '=', 'kedonthuocs.id_patient' )
        ->join('thuocs','thuocs.id' , '=', 'kedonthuocs.id_medicine')
        ->select('benhnhans.*', 'kedonthuocs.*', 'thuocs.*')
        ->where('kedonthuocs.id', '=', $id)
        ->get();
        // dd($users);
         return $users;
     }
}
