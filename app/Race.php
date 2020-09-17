<?php
//https://medium.com/@codingcave/organizing-your-laravel-models-6b327db182f9
namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    /**
    * De database table die moet worden gelinkt aan het model.
    *
    * @var string
    */
    protected $table = 'races';

    /**
     * De primary key in de table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function penalty(){
        return $this->belongsToMany('App\Penalty');
    }

    public function result(){
        return $this->belongsToMany('App\Result');
    }
}
