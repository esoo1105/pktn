<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Yta;

class LapHoaDon extends yta
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Yta();
    }

    public function index(Request $request){

        $this->data['title'] = 'Lập hóa đơn';

        $filters = [];
        $keywords = null;

        if(!empty($request->status)){
            $status = $request->status;
            if($status == 'Dichvu'){
                $status = 0;
            }else{
                $status = 1;
            }

            $filters[] = ['benhnhans.examination_service', '=', $status];
        }

               // lọc theo giới tính
               if(!empty($request->gioitinh)){
                $gioitinh = $request->gioitinh;
                if($gioitinh == 'Nam'){
                    $gioitinh = 1;
                }else{
                    $gioitinh = 0;
                }
    
                $filters[] = ['benhnhans.gender', '=', $gioitinh];
            }
        
        if(!empty($request->keywords)){
            $keywords = $request->keywords;
        }

        $userList = $this->users->getAllTable($filters,$keywords);
        
        return view('nurse.function.hoadon.laphoadon', $this->data, compact('userList'));
    }
    
}
