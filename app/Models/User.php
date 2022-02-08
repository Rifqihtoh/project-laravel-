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

class User extends Authenticatable
{
	use HasFactory,Notifiable;
    protected $primaryKey = 'User_id';
    protected $table = 'users';
    protected $fillable = ['Nama','Alamat','No_telepon','email','password','Jenis_kelamin','Tanggal_lahir','User_desc','User_photo'];
    public function registrations()
    {
        return $this->morphToMany(Registration::class, 'registerable');
    }
}
