<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Supplier extends Model
{
    use LogsActivity;

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

    public function article()
    {
        return $this->hasMany('App\Article');
    }
}
