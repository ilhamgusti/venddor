<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filter;
use App\QueryFilters\Status;

class Kontrak extends Model
{

    use Filter;

    protected $table = 'kontrak';

    protected function getFilters()
    {
        return [
            Status::class,
        ];
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class,'proyek_id','id');
    }

    public function remarks()
    {
        return $this->morphMany(Remarks::class,'remarkable');
    }

}
