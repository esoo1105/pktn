<?php

namespace App\Http\Controllers\nurse;

use Illuminate\Http\Request;
use App\Models\Chiphikham;


class ThuPhi extends chiphikham
{
    public $data = [];
    private $users;

    public function __construct(){
        $this->users = new Chiphikham();
    }

    public function index(Request $request)
    {
        $this->data['title'] = 'Thu phí';


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
        
        return view('nurse.function.phieuthu.phieuthu', $this->data, compact('userList'));
    }

    public function getEditBHYT($id=0){
        $this->data['title'] = 'Thu phí BHYT';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.phieuthu.xemphieuthu', $this->data, compact('userDetail'));
    }

    public function getEditDV($id=0){
        $this->data['title'] = 'Thu phí dịch vụ';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.phieuthu.xemphieuthudv', $this->data, compact('userDetail'));
    }

    public function getEditInBH($id=0){
        $this->data['title'] = 'In phiếu thu BHYT';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.infile.inphieuthu', $this->data, compact('userDetail'));
    }

    public function getEditInDV($id=0){
        $this->data['title'] = 'In phiếu thu dịch vụ';

        if(!empty($id)){
            $userDetail = $this->users->getDetail($id);
            if(!empty($userDetail[0])){
                $userDetail = $userDetail[0];
                // dd($userDetail);
            }
        }

        return view('nurse.function.infile.inphieuthudv', $this->data, compact('userDetail'));
    }
}
