<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    public function costumer()
    {
        return $this->belongsTo('App\Costumer','costumer_id');
    }
    public function rute()
    {
        return $this->belongsTo('App\Rute','rute_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
