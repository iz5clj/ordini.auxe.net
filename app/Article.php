<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function line()
    {
        return $this->hasMany('App\Line');
    }

    public function setPrezzoAttribute($value)
    {
        $this->attributes['prezzo'] = $value * 100;
    }

    public function getPrezzoAttribute($value)
    {
        // return number_format( $value / 100, 2, ",", ".");
        return $value / 100;
    }
    
}
