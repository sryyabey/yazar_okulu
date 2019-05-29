<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class main_kursu extends Model
{
    protected $table="kursu";
    protected $guarded=[];

    public function alt_kursu(){
        return $this->hasMany('App\Models\alt_kursu');
    }
}
