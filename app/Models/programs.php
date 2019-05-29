<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\teacher;
use App\Models\students;
use App\Models\programs;
use App\Models\katilim;
use App\Models\katilim_pivot;

class programs extends Model
{
    protected $table="programs";
    protected $guarded=[];

    public function egitimci(){

        return $this->hasOne('\App\Models\teacher','id','egitimci_id');
    }

    public function AltKursu(){
        return $this->hasOne('\App\Models\alt_kursu','id','alt_kursu');
    }

    public function user(){
        return $this->hasOne('\App\User','id','user_id');
    }

    public function katilim(){
        return $this->belongsToMany(\App\Models\katilim::class,'katilim_pivot','programs_id','katilim_id');
    }

    public function student(){
        return $this->belongsToMany(\App\Models\students::class,'katilim_pivot','programs_id','students_id');
    }





}
