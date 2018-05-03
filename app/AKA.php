<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AKA extends Model
{
    //
    protected $table = 'aka_mc';

    public function akaMc()
    {
        return $this->belongsTo('App\Mc');
    }
}
