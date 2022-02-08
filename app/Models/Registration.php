<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $primaryKey = 'Regis_id';
    protected $table = 'registrations';
    protected $fillable = ['Ev_id','User_id','username','status'];

    public function users()
    {
        return $this->morphedByMany(User::class, 'registerable');
    }
    public function events()
    {
        return $this->belongsTo(Event::class, 'Ev_id');
    }

}
