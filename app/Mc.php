<?php

namespace App;

use App\User;
use App\Aka;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;

class Mc extends Model
{

    protected $table = 'mc';

    /*public function profileMC()
    {
        return $this->with("getAka")->with("getMc");
    }*/

    public function getAka()
    {
        $get = $this->hasMany('App\Aka', 'id_mc', 'id');

        if ($get!=null) {
            return $this->hasMany('App\Aka', 'id_mc', 'id');
        }
        return false;


    }

    public function getMc()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

}
