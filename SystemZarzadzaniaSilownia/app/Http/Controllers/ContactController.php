<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ContactController extends Controller
{
    public function index()
    {
    if (Auth::check()) {
        $gyms = DB::table('gym')->select('*')->get();
        return view('sites/contact')->with('gyms',$gyms);
    }else{
        return view('auth/login');
    }
    }
}
