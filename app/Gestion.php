<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    //

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Tickets(){
        return $this->hasMany('App\Ticket');
    }
}
