<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regapproval extends Model
{
    protected $table = 'regapproval';
    protected $fillable = ['Org_id','Regis_id'];
}
