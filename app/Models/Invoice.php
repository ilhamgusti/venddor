<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filter;
use App\QueryFilters\Status;
class Invoice extends Model
{

    use Filter;
    
    protected function getFilters()
    {
        return [
            Status::class,
        ];
    }

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
