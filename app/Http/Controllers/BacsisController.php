<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\BacSi;

class BacsisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('usertype', 2)->get();
        foreach ($users as $user){
        $exit_bacsi = 0;    
        $exit_bacsi = Bacsi::where('email', $user->email)->count();
            if($exit_bacsi==0) {
            $bacsi = new BacSi();
            $bacsi->name = $user->name;
            $bacsi->email = $user->email;
            $bacsi->phone = $user->phone;
            $bacsi->address = $user->address;
            $bacsi->password = $user->password;
            $bacsi->save();
        }}
        $bacsis = DB::table('users')
            ->where('usertype', 2)
            ->get();
        return view('admin.inforbacsi', compact('bacsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createbacsi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $bacsi = new User();
        $bacsi->name = $request->input('fullname');
        $bacsi->phone = $request->input('phone');
        $bacsi->address = $request->input('diachi');
        $bacsi->password = $request->input('password');
        $bacsi->email = $request->input('email');
        $bacsi->usertype = '2';
        $bacsi->save();
        return redirect('/inforbacsi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bacsi = User::find($id);
        $bacsi->delete();
        return redirect('/inforbacsi');
    }

    // Lấy toàn bộ dữ liệu từ bảng users với điều kiện usertype = 1
}