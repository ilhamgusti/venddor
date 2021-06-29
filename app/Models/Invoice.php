<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    // protected $table = 'invoice';

    public function proyek()
    {
        return $this->belongsTo(Proyek::class,'proyek_id','id');
    }

    public function remarks()
    {
        return $this->morphMany(Remarks::class,'remarkable');
    }

}
