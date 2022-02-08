<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function portal()
    {
    	return view('index');
    }
    public function userHome()
    {
    	return view('userHome');
    }
    public function admHome()
    {
        /*$role = Auth::user()->User_type;
        if($role == "a"){
            return redirect()->route('adminHome');
        } else{
            return redirect()->route('adminLogin');
        }*/
        $user = Auth::user();
    	return view('adminHome', compact('user'));
    }
    public function orgHome()
    {
    	return view('orgHome');
    }
}
