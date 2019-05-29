<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class alt_kursu extends Model
{
    protected $table="alt_kursu";
    protected $guarded=[];

    public function kursu(){
        return $this->hasOne('App\Models\main_kursu','id','main_kursu_id');
    }

    public function program(){
        return $this->hasMany('App\Models\programs','alt_kursu','id');
    }
}
