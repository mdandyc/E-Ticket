<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportation';

    public function transportationtype()
    {
        return $this->belongsTo('App\transportationtype','transportation_type_id');
    }
}
