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

class EventRegisterController extends Controller
{
    public function daftar()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $event = Event::all();
            return view('users.daftar', compact('event'));
        }
        return redirect()->route('userLogin');
    }
    public function store(Request $request)
    {
        $id = Auth::id();
        $request->validate([
            'username' => 'required',
            'Ev_id' => 'required',
        ]);
        Registration::create([
            'username' => $request->username,
            'User_id' => $id,
            'Ev_id' => $request->Ev_id,
        ]);
        $event = Event::where('Ev_id', $request->Ev_id)->first();
        $event->Ev_kuota = $event->Ev_kuota - 1;
        $event->save();
        return redirect('/user/register')->with('status','Registrasi berhasil ditambah');
    }
    public function destroy(Registration $registration)
    {
        Registration::destroy($registration->Regis_id);
        $event = Event::where('Ev_id', $registration->Ev_id)->first();
        $event->Ev_kuota = $event->Ev_kuota + 1;
        $event->save();
        return redirect()->route('user.lists')->with('status','Registrasi berhasil dihapus');
    }
}