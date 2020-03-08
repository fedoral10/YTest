<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GestionCliente extends Model
{
    //
    public function Tickets(){
        return $this->hasMany('App\Ticket');
    }
}
