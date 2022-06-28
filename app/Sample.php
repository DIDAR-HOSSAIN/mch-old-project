<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = [
        'pid','name', 'sample_collected_by','symptom','sample_classification', 'specimen_details','sample_collection_date','remarks',
    ];
}
