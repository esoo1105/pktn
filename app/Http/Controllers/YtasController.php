<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Yta;

class YtasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('usertype', '=', 3)->get();
        foreach ($users as $user){
        $exit_yta = 0;
        $exit_yta = Yta::where('email', $user->email)->count();
        if($exit_yta==0) {
            $yta = new Yta();
            $yta->name = $user->name;
            $yta->email = $user->email;
            $yta->phone = $user->phone;
            $yta->address = $user->address;
            $yta->password = $user->password;
            $yta->save();
        }}
        $ytas = DB::table('users')
        ->where('usertype', 3)
        ->get();
        return view('admin.inforyta', compact('ytas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createyta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $yta = new User();
        $yta->name = $request->input('fullname');
        $yta->phone = $request->input('phone');
        $yta->address = $request->input('diachi');
        $yta->password = $request->input('password');
        $yta->email = $request->input('email');
        $yta->usertype = "3";
        $yta->save();
        return redirect('/inforyta');
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
    public function destroy(string $id)
    {
        $yta = User::find($id);
        $yta->delete();

        return redirect('/inforyta');
    }
}