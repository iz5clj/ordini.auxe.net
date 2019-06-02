<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Agent extends Model
{
    use LogsActivity;

    protected $appends = ['fullname'];

    /**
     * Always capitalize the "nome" when we save it to the database
     */
    public function setNomeAttribute($value) {
        $this->attributes['nome'] = ucfirst($value);
    }

    /**
     * Always capitalize the "cognome" when we save it to the database
     */
    public function setCognomeAttribute($value) {
        $this->attributes['cognome'] = ucfirst($value);
    }

    /**
     * Get the user's full concatenated name.
     * -- Must postfix the word 'Attribute' to the function name
     *
     * @return string
     */

    public function getFullnameAttribute()
    {
        return "{$this->nome} {$this->cognome}";
    }

}
