<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournaments extends Model
{

    //devuelve la cantidad de torneos registrados
    public function scopeNTorneos()
    {
        return $this->count();
    }

    //devuelve el SELECT del nombre pasado por parametro, si no existe devuelve null
    public function scopechkName($query , $name)
    {
        $name = $query->where('name', $name)->first();
        return $name;
    }

    //
    public function events()
    {
        // return $this->hasManyThrough('App\Events');
        return $this->hasMany(Events::class, 'id_tournament', 'id');
    }
}
