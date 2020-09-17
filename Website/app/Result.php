<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
    * De database table die moet worden gelinkt aan het model.
    *
    * @var string
    */
    protected $table = 'results';

    /**
     * De primary key in de table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function driver(){
        return $this->belongsTo('App\Driver');
    }

    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function race(){
        return $this->belongsTo('App\Race');
    }
}
