<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evapproval extends Model
{
    protected $table = 'evapproval';
    protected $fillable = ['Ev_id','User_id'];
}
