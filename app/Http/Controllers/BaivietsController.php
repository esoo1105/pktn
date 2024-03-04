<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Baiviet;

class BaivietsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baiviets = DB::table('baiviets')->get();
        return view('admin.inforbaiviet', compact('baiviets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createbaiviet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baiviet = new Baiviet();
        $baiviet->name = $request->input('title');
        $baiviet->noidung = $request->input('content');
        $baiviet->save();

        return redirect('/inforbaiviet');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $baiviet = Baiviet::find($id)->first();
        //dd($baiviet);
        return view('admin.updatebaiviet')->with('baiviet', $baiviet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $baiviet = Baiviet::where('id', $id)->update([
            'name' => $request->input('title'),
            'noidung' => $request->input('content'),
        ]);
    
        return redirect('/inforbaiviet');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baiviet = Baiviet::find($id);
        $baiviet->delete();
        return redirect('/inforbaiviet');
    }

  

}
