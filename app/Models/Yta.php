<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Yta extends Model
{
    use HasFactory;

       // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
    /* 
    Dùng hiển thị thông tin cho các giao diện trang chủ, lập phiếu khám và lập dang sách
    */
    public function getAllTable($filters = [], $keywords = null){
        $users = DB::table('benhnhans')
        ->select('benhnhans.*');

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


    // thêm dữ liệu ở lập phiếu khám
    public function addPhieu($data){
       DB::insert('INSERT INTO chisosuckhoes (id_patient, huyetap, nhiptim, cannang, chieucao, nhietdo,	ngaydo	
       ) values (?, ?, ?, ?, ?, ?, ?)', $data);
    }


    // thêm thông tin bệnh nhân vào bảng users trong lập danh sachs bệnh nhân
    public function addPhieuKham($data){
        DB::insert('INSERT INTO benhnhans (name, email, phone, address, cccd, gender, examination_service, usertype, 
        email_verified_at, password, current_team_id, profile_photo_path,  created_at
        ) values ( ?, ?, ?, ?, ?, ?, ?, 0, null, ?, null, null, ?)', $data);
     }

     public function uploadDS($data){

        $data = array_merge($data);
        return DB::upload('UPLOAD benhnhans SET name = ?, email = ?, phone = ?, address = ?, cccd = ?, gender = ?, examination_service = ?, usertype = 0, 
        email_verified_at = null, password = ?, current_team_id = null, profile_photo_path = null,  created_at = ?  WHERE id = ?
        ', $data);
     }

          /* 
          dùng để chuyển dữ liệu bệnh nhân qua lại các form
             lập phiếu khám và cập nhật thông tin bệnh nhân
          */
          public function getDetailDS($id){
            $users = DB::table('benhnhans')
            ->select('benhnhans.*')
            ->where('benhnhans.id', '=', $id)
            ->get();
             return $users;
         }
     

}
