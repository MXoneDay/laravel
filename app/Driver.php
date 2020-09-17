<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{   
    /**
    * De database table die moet worden gelinkt aan het model.
    *
    * @var string
    */
   protected $table = 'drivers';

    /**
     * De primary key in de table.
     *
     * @var string
     */
    protected $primaryKey = 'driver_number';

    // https://www.youtube.com/watch?v=3Oxfi3DLdkI&t=111s
    // https://laravel.com/docs/7.x/eloquent-relationships
    // Toevoegen van relaties tussen de db

    public function team(){
        return $this->belongsTo('App\Team');
    }

    public function penalty(){
        return $this->hasMany('App\Penalty');
    }

    public function result(){
        return $this->hasMany('App\Result');
    }
}
