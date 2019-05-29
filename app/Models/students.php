<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\katilim;
use App\Models\katilim_pivot;

class students extends Model
{
    protected $table="students";
    protected $guarded=[];




    public function katilim(){
        return $this->belongsToMany(\App\Models\katilim::class,'katilim_pivot','students_id','katilim_id');
    }

    public function program(){
        return $this->belongsToMany(\App\Models\programs::class,'katilim_pivot','students_id','programs_id');
    }

}
