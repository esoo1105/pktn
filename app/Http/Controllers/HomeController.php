<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Yta;
use App\Models\kedon;

use DB;


class HomeController extends Controller
{
    public $data = [];
    private $yta;
    private $kedon;


    public function __construct(){
        $this->yta = new Yta();
        $this->kedon = new kedon();

    }

    public function redirect()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == '') {
                return view('user.home');
            } elseif ($user->usertype == '1') {
                return view('admin.index');
            } elseif ($user->usertype == '2') {
                $this->data['title'] = 'Trang chủ';
                
                $index = $this->kedon->danhsach();
                return view('doctor.home', $this->data, compact('index'));
            } elseif ($user->usertype == '3') {
                $userList = $this->yta->getAllTable();
                return view('nurse.home', compact('userList'));
            }
        }
    
        return redirect()->back();
    }

    public function index()
    {
        return view('user.home');
    }


    public function getEditKD($id=0){
        $this->data['title'] = 'Kê đơn thuốc';

        if(!empty($id)){
            $userDetail = $this->kedon->getDetailDS($id);
            $userDetailBS = $this->kedon->getDetailBS($id);
            if(!empty($userDetail[0]) && !empty($userDetailBS[0])){
                $userDetail = $userDetail[0];
                $userDetailBS = $userDetailBS[0];
            }

            
        }

        return view('doctor.bacsi.kedonthuoc', $this->data, compact('userDetail', 'userDetailBS'));
    }
}
