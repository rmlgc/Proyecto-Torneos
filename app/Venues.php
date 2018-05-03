<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venues extends Model
{
    //devuelve la cantidad de zonas en la base de datos
    public function scopeNZonas()
    {
        return $this->count();
    }

    //devuelve el SELECT del nombre asignado a la zona, si no existe devuelve null
    public function scopechkName($query, $name)
    {
        $name = $query->where('venue_name', $name)->first();

        return $name;
    }
}
