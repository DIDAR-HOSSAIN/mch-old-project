<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    protected $fillable = [
        'pid','name','entry_date','collection_date','due_amount', 'collection_amount','remarks'
    ];
}
