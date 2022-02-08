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

class OrgEvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::where('Org_id', Auth::guard('organizer')->id())->get();
        return view('organizers.evCRUD', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizers.createEvent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'uploads',
                'transformation' => [
                    'height' => 348,
                    'width' => 348,
                ]
            ])->getSecurePath();
        $org_id = Auth::guard('organizer')->id();
        $request->validate([
            'Ev_nama' => 'required',
            'Ev_game' => 'required',
            'Ev_description' => 'required',
            'Ev_kuota' => 'required',
            'Ev_startDate' => 'required',
            'Ev_endDate' => 'required',
            'Ev_genre' => 'required',
        ]);
        Event::create([
            'Ev_id' => $request->Ev_id,
            'Org_id' => $org_id,
            'Ev_nama' => $request->Ev_nama,
            'Ev_code' => $request->Ev_code,
            'Ev_game' => $request->Ev_game,
            'Ev_genre' => $request->Ev_genre,
            'Ev_description' => $request->Ev_description,
            'Ev_kuota' => $request->Ev_kuota,
            'Ev_startDate' => $request->Ev_startDate,
            'Ev_endDate' => $request->Ev_endDate,
            'Ev_photo' => $img,
            /*'Org_nama' => $request->Org_nama,
            'Org_alamat' => $request->Org_alamat,
            'Org_telepon' => $request->Org_telepon,
            'Org_email' => $request->Org_email,
            'Org_password' => $request->Org_password,
            'Org_description' => $request->Org_description*/
        ]);

        return redirect('/organizer/events')->with('status','Data event berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Organizer $organizer)
    {
        return view('organizers.showEvent', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('organizers.editEvent', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if($request->file('image')){
            $img = cloudinary()->upload($request->file('image')->getRealPath(), [
                'folder' => 'uploads',
                'transformation' => [
                    'height' => 348,
                    'width' => 348,
                ]
            ])->getSecurePath();
        } else {
            $img = $event->Ev_photo;
        }
        Event::where('Ev_id', $event->Ev_id)
                ->update([
                    'Ev_nama' => $request->Ev_nama,
                    'Ev_code' => $request->Ev_code,
                    'Ev_game' => $request->Ev_game,
                    'Ev_genre' => $request->Ev_genre,
                    'Ev_description' => $request->Ev_description,
                    'Ev_kuota' => $request->Ev_kuota,
                    'Ev_startDate' => $request->Ev_startDate,
                    'Ev_endDate' => $request->Ev_endDate,
                    'Ev_photo' => $img,
                    /*'Org_nama' => $request->Org_nama,
                    'Org_alamat' => $request->Org_alamat,
                    'Org_telepon' => $request->Org_telepon,
                    'Org_email' => $request->Org_email,
                    'Org_password' => $request->Org_password,
                    'Org_description' => $request->Org_description*/
                ]);
        return redirect()->route('events.index')->with('status','Data event berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->Ev_id);
        return redirect()->route('events.index')->with('status','Data event berhasil dihapus');
    }
    public function approve(Event $event)
    {
        Event::where('Ev_id', $event->Ev_id)
                ->update([
                    'Ev_status' => 'approved',
                ]);
        return redirect('/events')->with('status','Event approved');
    }
}
