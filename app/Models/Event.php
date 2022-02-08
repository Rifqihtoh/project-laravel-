<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'Ev_id';
    protected $table = 'events';
    protected $fillable = ['Ev_id','Org_id','Ev_code','Ev_nama','Ev_game','Ev_kuota','Ev_startDate','Ev_endDate','Ev_description','Ev_photo','Ev_genre', 'Ev_status'];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'Org_id');
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class,'Ev_id');
    }
}
