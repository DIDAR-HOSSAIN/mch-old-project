<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'pid','sid', 'name','entry_date','date_of_test_result', 'Amphetamine','Benzodiazepines','Opiates','Cannabinoids','Alcohol','delivery_status','remarks',
    ];
}
