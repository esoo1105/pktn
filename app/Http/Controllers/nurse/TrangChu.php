<?php

namespace App\Http\Controllers\nurse;


use Illuminate\Http\Request;
use App\Models\Yta;

class TrangChu extends yta
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Yta();
    }

    //Hiển thị giao diện trang chủ
    public function index()
    {
        $this->data['title'] = 'Trang Chủ';

        $userList = $this->users->getAllTable();
         return view('nurse.home', $this->data, compact('userList'));
    }

    public function getEditBS($id=0){
        $this->data['title'] = 'Bác sĩ 1';

        if(!empty($id)){
            $userDetail = $this->users->getDetailDS($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
            }
        }
        return view('Bacsi.thongtin', $this->data, compact('userDetail'));
    }
}
