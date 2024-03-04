<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Xemthuoc;

class XemLsDonThuoc extends xemthuoc
{
    public $data = [];
    private $users;

    

    public function __construct(){
        $this->users = new Xemthuoc();
    }

    public function index(Request $request){
        $this->data['title'] = 'Lịch sử đơn thuốc';

        $filters = [];
        $keywords = null;

        // lọc theo bảo hiểm y tế
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


        $userList = $this->users->getAllTable($filters, $keywords);
        
        return view('nurse.function.donthuoc.xemlsdonthuoc', $this->data, compact('userList'));

    }

    public function getEditCT($id=0){
        $this->data['title'] = 'Xem lịch sử đơn thốc';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                        // dd($userDetail);
            }
        }

        return view('nurse.function.donthuoc.chitietdonthuoc', $this->data, compact('userDetail'));
    }

    public function getEditInDT($id=0){
        $this->data['title'] = 'In đơn thốc';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                        // dd($userDetail);
            }
        }

        return view('nurse.function.infile.indonthuoc', $this->data, compact('userDetail'));
    }

}
