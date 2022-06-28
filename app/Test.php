<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'test_id','entry_date','test_name', 'amount',
    ];

    public function dopereg (){
        return $this->belongsTo(Dopereg::class);
    }

}
