<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dopereg extends Model
{
//    protected $fillable = [
////       'patient_id', 'reg_date', 'name', 'sex', 'passport_no', 'address', 'district_name', 'thana_name', 'contact_no', 'image', 'dob', 'age', 'nid',
////        'collection_type', 'reference', 'reg_fee', 'discount', 'total', 'paid', 'payment_type', 'account_head', 'user_name'
////    ];
    protected $guarded = [];
    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function policeStation()
    {
        return $this->belongsTo('App\Thana');
    }
}
