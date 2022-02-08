<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Event()
    {
    	return view('userEvents');
    }
    public function Login()
    {
    	return view('userLogin');
    }
    public function Register()
    {
    	return view('userRegister');
    }
    public function daftar()
    {
    	return view('daftarEvent');
    }
    public function profile()
    {
        return view('users.profile');
    }
}
