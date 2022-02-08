<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Organizer;

class OrgAuthController extends Controller
{

    public function getLogin()
    {
        if (Auth::guard('organizer')->check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard');
        }
        return view('orgLogin');
    }

    public function postLogin(Request $request)
    {
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
            'Org_email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
        //dd($data);
        //dd(Auth::attempt($data));
        //dd($test);
        //Auth::guard('organizer')->attempt($data);
        (Auth::guard('organizer')->attempt($data));
        if (Auth::guard('organizer')->attempt($data)) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            //Auth::login($user);
            return redirect()->route('dashboard');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('/orgLogin')->with('status','error');
        }
    }
    public function Register(){
        return view('orgRegister');
    }
    public function postRegister(Request $request){
        $img = 'https://www.pngarts.com/files/10/Default-Profile-Picture-Download-PNG-Image.png';
        $request->validate([
            'Org_nama' => 'required',
            'Org_alamat' => 'required',
            'Org_email' => 'required',
            'Org_password' => 'required',
        ]);
        Organizer::create([
            'Org_nama' => $request->Org_nama,
            'Org_alamat' => $request->Org_alamat,
            'Org_telepon' => $request->Org_telepon,
            'Org_email' => $request->Org_email,
            'Org_password' => Hash::make($request->Org_password),
            'Org_description' => $request->Org_description,
            'Org_photo' => $img
        ]);
        return redirect()->route('orgLogin')->with('status','Registrasi akun berhasil');
    }

    public function postLogout()
    {
        Auth::guard('organizer')->logout();
        session()->flush();

        return redirect()->route('orgLogin');
    }
    public function edit()
    {
        $organizer = Organizer::where('Org_id', Auth::guard('organizer')->id())->first();
        //dd($user);
        return view('organizers.update2', compact('organizer'));
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
            $img = Organizer::find(Auth::guard('organizer')->id());
            return $img->Org_photo;
        }
    }
    public function update(Request $request)
    {
        $img = self::images($request);
        Organizer::where('Org_id', Auth::guard('organizer')->id())
                ->update([
                    'Org_nama' => $request->Org_nama,
                    'Org_alamat' => $request->Org_alamat,
                    'Org_telepon' => $request->Org_telepon,
                    'Org_email' => $request->Org_email,
                    'Org_photo' => $img,
                ]);
        return redirect()->route('org.details')->with('status','Data organizer berhasil diperbarui');
    }
    public function editPassword()
    {
        $organizer = Organizer::where('Org_id', Auth::guard('organizer')->id())->first();
        //dd($user);
        return view('organizers.editPass', compact('organizer'));
    }
    public function updatePassword(Request $request)
    {
        Organizer::where('Org_id', Auth::guard('organizer')->id())
                ->update([
                    'Org_password' => Hash::make($request->Org_password),
                ]);
        return redirect()->route('org.details')->with('status','Data organizer berhasil diperbarui');
    }
    public function editDesc()
    {
        $organizer = Organizer::where('Org_id', Auth::guard('organizer')->id())->first();
        //dd($user);
        return view('organizers.editDesc', compact('organizer'));
    }
    public function updateDesc(Request $request)
    {
        Organizer::where('Org_id', Auth::guard('organizer')->id())
                ->update([
                    'Org_description' => $request->Org_description
                ]);
        return redirect()->route('org.details')->with('status','Data organizer berhasil diperbarui');
    }
    public function show()
    {
        $organizer = Organizer::find(Auth::guard('organizer')->id());
        return view('organizers.show', compact('organizer'));
    }
}