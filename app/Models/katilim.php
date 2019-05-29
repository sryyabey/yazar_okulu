<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class katilim extends Model
{
    protected $table="katilim";
    protected $guarded=[];

    public function students(){
        return $this->belongsToMany(\App\Models\students::class,'katilim_pivot','katilim_id','students_id');
    }

    public function programs(){
        return $this->belongsTo(\App\Models\programs::class,'katilim_pivot','katilim_id','programs_id');
    }

    public function katilim()
    {
        return $this->hasOne(\App\Models\programs::class,'id','programs_id');
    }
}
