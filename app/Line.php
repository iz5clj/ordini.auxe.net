<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    const CREATA     = 1;
    const NOTIFICATA = 2;
    const CONFERMATA = 3;
    const INVIATA    = 4;

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function getSupplierAttribute($value)
    {
        return 1;
    }

    public function scopeCreata($query)
    {
        return $query->where('stato', static::CREATA);
    }
}
