<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AdminAuthController extends Controller
{
    public function login(){
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('adminHome');
        }
        return view('AdminAuth.login');
        
    }
    public function pastlogin(Request $request){
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        /*$user = User::where([
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        ])->first();*/
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
        //dd(Auth::attempt($data));
        Auth::attempt($data);
        //dd($test);
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            //Auth::login($user);
            return redirect()->route('adminHome');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('/adminLogin')->with('status','error bang');
        }
        /*if ($user) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            Auth::login($user);
            return redirect()->route('adminHome');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('/adminLogin')->with('status','error bang');
        }*/
    
    }
    /*public function register(){
        return view('user.register');
    }
    public function pastregister(Request $request){
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'gender' => 'required',
            'password' => 'required|confirmed',
        ]);
        User::create([
            'nama' => $request['nama'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'email' => $request['email'],
            'telp' => $request['telp'],
            'alamat' => $request['alamat'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('login');
    }*/
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('adminLogin');
    }

}