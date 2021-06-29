<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{

    protected $table = 'kontrak';

    public function proyek()
    {
        return $this->belongsTo(Proyek::class,'proyek_id','id');
    }

    public function remarks()
    {
        return $this->morphMany(Remarks::class,'remarkable');
    }

}
