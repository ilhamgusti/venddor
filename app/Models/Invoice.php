<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function proyek()
    {
        return $this->belongsTo(Proyek::class,'proyek_id','id');
    }
}
