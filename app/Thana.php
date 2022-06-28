<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $guarded = [];
    public function district(){
        return $this->belongsTo('App\District');
    }
    public function dopeRegs(){
        return $this->hasMany('App\Dopereg');
    }

}
