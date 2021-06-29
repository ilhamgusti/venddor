<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function proyek(){
        return $this->hasMany(Proyek::class,'proyek_id','id');
    }
}
