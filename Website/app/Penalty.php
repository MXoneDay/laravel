<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    /**
    * De database table die moet worden gelinkt aan het model.
    *
    * @var string
    */
    protected $table = 'penalties';

    /**
     * De primary key in de table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function race(){
        return $this->belongsTo('App\Race');
    }

    public function driver(){
        return $this->belongsTo('App\Driver');
    }
}
