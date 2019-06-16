<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    const CREATO     = 1;
    const NOTIFICATO = 2;
    const CONFERMATO = 3;
    const INVIATO    = 4;

    public function lines()
    {
        return $this->hasMany('App\Line');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCreatoIlAttribute($value)
    {
        $date = Carbon::parse($value);
        $date->locale('it_IT');

        return $date->format('j F Y');
    }

    public function getStatoAttribute($value)
    {
        switch ($value)
        {
            case static::CREATO:
            return 'Creato';

            case static::CONFERMATO:
            return 'Confermato';

            case static::INVIATO:
            return 'Inviato';
        }

        return $value;
    }

    public function scopeCreato($query)
    {
        return $query->where('stato', static::CREATO);
    }
}
