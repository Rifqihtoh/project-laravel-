<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Organizer;
use App\Models\Registration;
use App\Models\Regapproval;

class OrgRegisterController extends Controller
{
    public function list(Organizer $organizer)
    {
        $org_id = Auth::guard('organizer')->id();
        //$event_id = Event::where('Org_id', $org_id)->get()->map->only(['Ev_id']);
        //$registration = Registration::where('Ev_id', $event_id)->get();
        //$event = Event::find(1)->registrations;
        //$event = Event::with('registrations')->where('Org_id', $org_id)->get();
        //$event = Event::with('Registrations')->get();
        //$registration = $event->registrations;
        $organizer = Organizer::where('Org_id', $org_id)->get();
        $registration = $organizer->first()->registrations;
        //dd($event);
        //dd($registration);
        return view('organizers.regCRUD', compact('registration'));
    }
    public function approve(Request $request)
    {
        $org_id = Auth::guard('organizer')->id();
        $status = 'approved';
        $regid = $request->Regis_id;
        //dd($regid);
        //dd($status);
        Registration::where('Regis_id', $regid)
                ->update([
                    'status' => $status,
                ]);
        Regapproval::create([
            'Org_id' => $org_id,
            'Regis_id' => $regid,
        ]);
        return redirect()->route('org.reg.list')->with('status','Registrasi berhasil di approve');
    }
}