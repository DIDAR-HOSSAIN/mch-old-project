<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];

    public function policeStations(){
        return $this->hasMany('App\Thana');
    }

    public function dopeRegs(){
        return $this->hasMany('App\Dopereg');
    }

}
