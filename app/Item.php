<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function room()
    {
        return $this->hasOne('App\room','id','room_id');
    }

    public function type()
    {
        return $this->hasOne('App\Type','id','type_id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','officer_id');
    }

    public function indonesian_currency($value)
    {
        return number_format($value, 2, ',', '.');
    }
}
