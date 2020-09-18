<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenaltiesController extends Controller
{
    public static function array_sort($array)
    {
        foreach($array as $item)
        {
            foreach($item as $key=>$value)
            {
                if(!isset($sort[$key]))
                {
                    $sort[$key] = array();
                }
                $sort[$key][] = $value;
            }
        }
        return $sort;
    }
}
