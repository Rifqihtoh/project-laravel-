<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Facades\Hash;

class Organizer extends Authenticatable
{
    protected $guard = 'organizers';
    protected $primaryKey = 'Org_id';
    protected $table = 'organizers';
    protected $fillable = ['Org_nama','Org_email','Org_telepon','Org_email','Org_password','Org_description','Org_alamat'];

    public function event()
    {
        return $this->hasMany(Event::class, 'Org_id', 'Ev_id');
    }
}
