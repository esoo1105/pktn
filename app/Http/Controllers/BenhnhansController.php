<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Benhnhan;

class BenhnhansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('usertype', '=', 0)->get();
        foreach ($users as $user) {
            $exit_benhnhan = 0;    
            $exit_benhnhan = Benhnhan::where('email', $user->email)->count();
            if($exit_benhnhan==0) {
            $benhnhan = new Benhnhan();
            $benhnhan->name = $user->name;
            $benhnhan->email = $user->email;
            $benhnhan->phone = $user->phone;
            $benhnhan->address = $user->address;
            $benhnhan->password = $user->password;
            $benhnhan->save();
        }}
        $benhnhans = DB::table('benhnhans')->get();
        return view('admin.inforbenhnhan', compact('benhnhans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}