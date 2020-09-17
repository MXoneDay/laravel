<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
    * De database table die moet worden gelinkt aan het model.
    *
    * @var string
    */
    protected $table = 'teams';

    /**
     * De primary key in de table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Het defenieren van de relaties met de andere tabels
     */

    public function driver(){
        return $this->hasMany('App\Driver');
    }

    public function result(){
        return $this->hasMany('App\Result');
    }


}
