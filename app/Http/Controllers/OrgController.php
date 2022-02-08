<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function Login()
    {
    	return view('orgLogin');
    }
    public function Register()
    {
    	return view('orgRegister');
    }
    public function add()
    {
    	return view('tambahEvent');
    }
    public function dashboard()
    {
        return view('organizers.profile');
    }
}
