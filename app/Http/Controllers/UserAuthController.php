<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;


class UserAuthController extends Controller
{
    public function login(){
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('userProfile');
        }
        return view('userLogin');
        
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
        //dd($data);
        //dd(Auth::attempt($data));
        Auth::attempt($data);
        //dd($test);
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            //Auth::login($user);
            return redirect()->route('userProfile');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('/userLogin')->with('status','error bang');
        }
       
    
    }
    public function register(){
        return view('userRegister');
    }
    public function pastregister(Request $request){
        $img = 'https://www.pngarts.com/files/10/Default-Profile-Picture-Download-PNG-Image.png';
        $request->validate([
            'Nama' => 'required',
            'Alamat' => 'required',
            'No_telepon' => 'required',
            'email' => 'required',
            'password' => 'required',
            'Jenis_kelamin' => 'required',
            'Tanggal_lahir' => 'required',
        ]);
        User::create([
            'Nama' => $request->Nama,
            'Alamat' => $request->Alamat,
            'No_telepon' => $request->No_telepon,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Jenis_kelamin' => $request->Jenis_kelamin,
            'Tanggal_lahir' => $request->Tanggal_lahir,
            'User_desc' => $request->input('User_desc'),
            'User_photo' => $img
        ]);
        return redirect()->route('userLogin')->with('status','Registrasi akun berhasil');
    }
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('userLogin');
    }
    public function show()
    {
        $user = User::find(Auth::id());
        return view('users.show', compact('user'));
    }
    public function showRegister()
    {
        $registration = Registration::where('User_id',Auth::id())->get();
        return view('users.registered', compact('registration'));
    }
    public function edit()
    {
        $user = User::where('User_id', Auth::id())->first();
        //dd($user);
        return view('users.edit', compact('user'));
    }
    public function images(Request $request)
    {
        if($request->file('image')){
            $compressedimage = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'uploads',
                'transformation' => [
                    'height' => 348,
                    'width' => 348,
                ]
            ])->getSecurePath();
            return $compressedimage;
        } else {
            $img = User::find(Auth::id());
            return $img->User_photo;
        }
    }
    public function update(Request $request)
    {
        //dd($request);
        $img = self::images($request);
        $request->validate([
            'Nama' => 'required',
            'Alamat' => 'required',
            'email' => 'required',
        ]);

        User::where('User_id', Auth::id())
                ->update([
                    'Nama' => $request->Nama,
                    'Alamat' => $request->Alamat,
                    'No_telepon' => $request->Telepon,
                    'email' => $request->email,
                    'User_photo'=> $img,
                ]);
        return redirect('/user/details')->with('status','Data user berhasil diperbarui');
    }
    public function editPassword()
    {
        $user = User::where('User_id', Auth::id())->first();
        //dd($user);
        return view('users.editPassword', compact('user'));
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        User::where('User_id', Auth::id())
                ->update([
                    'password' => Hash::make($request->password),
                ]);
        return redirect('/user/details')->with('status','Data user berhasil diperbarui');
    }
    public function editDesc()
    {
        $user = User::where('User_id', Auth::id())->first();
        //dd($user);
        return view('users.editDesc', compact('user'));
    }
    public function updateDesc(Request $request)
    {
        $request->validate([
            'User_desc' => 'required',
        ]);

        User::where('User_id', Auth::id())
                ->update([
                    'User_desc' => $request->User_desc,
                ]);
        return redirect('/user/details')->with('status','Data user berhasil diperbarui');
    }
    public function listEvents()
    {
        $event = Event::where('Ev_status', 'approved')->get();
        return view('events.list', compact('event'));
    }
    public function showEvent(Event $event)
    {
        return view('events.show', compact('event'));
    }
}