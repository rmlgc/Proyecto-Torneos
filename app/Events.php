<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    //devuelve el SELECT del nombre pasado por parametro, si no existe devuelve null
    public function scopechkName($query , $name)
    {
        $name = $query->where('name', $name)->first();
        return $name;
    }
}
