<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ingridient
 *
 * @author mirche
 */
class Ingridient extends Eloquent
{
     public static $timestamps = true;

    /**
     * pack values as regular select
     */
    public static function lookup(){

        $ingridients  = self::all();

        return View::make('admin.ingridient.lookup')->with('ingridients', $ingridients);

    }
}

?>
