<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bacsi;
use App\Models\Yta;
use App\Models\Baiviet;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy số lượng tài khoản y tá
        $soluongyt = DB::table('users')->where('usertype', 3)->count();
        // Lấy số lượng tài bài viết
        $soluongbv = DB::table('baiviets')->count();
        // Lấy số lượng tài khoản bác sĩ
        $soluongbs = DB::table('users')->where('usertype', 2)->count();
        // Lấy số lượng bài viết đã được thêm trong ngày hôm nay
        $postsAddedToday = DB::table('baiviets')
            ->whereDate('created_at', today())
            ->count();
        // Lấy số lượng tài khoản bác sĩ đã được thêm trong ngày hôm nay
            $bacsisAddedToday = DB:: table('users')
                ->where('usertype', 3)
            ->whereDate('created_at', today())
            ->count();
        // Lấy số lượng tài khoản y tá đã được thêm trong ngày hôm nay
        $ytasAddedToday = DB:: table('users')
            ->where('usertype', 2)
            ->whereDate('created_at', today())
            ->count();
        return view('admin.trangchu', compact('soluongyt', 'soluongbv', 'soluongbs', 'postsAddedToday', 'bacsisAddedToday', 'ytasAddedToday'));
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
