<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController13 extends Controller
{
    public function ps()
    {
        $userId = Auth::id();
        $user = users::find($userId);

        return view('doctor.bacsi.profile', compact('user'));
    }
}
