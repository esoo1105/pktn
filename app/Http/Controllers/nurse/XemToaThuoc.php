<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Xemthuoc;

class XemToaThuoc extends xemthuoc
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Xemthuoc();
    }

    public function index(Request $request){
        $this->data['title'] = 'Xem toa thuốc';

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

        $userList = $this->users->getAllTable($filters, $keywords);
        
        return view('nurse.function.toathuoc.xemtoathuoc', $this->data, compact('userList'));
    }


    public function getEdit($id=0){
        $this->data['title'] = 'Xem toa thuốc';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.toathuoc.toathuoc', $this->data, compact('userDetail'));
    }


    public function getEditIn($id=0){
        $this->data['title'] = 'In toa thuốc';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.infile.intoathuoc', $this->data, compact('userDetail'));
    }

}
