<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute';

    public function transportation()
    {
        return $this->belongsTo('App\Transportation','transportation_id');
    }
}
