<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pack
 *
 * @author mirche
 */
class Pack extends Eloquent
{
    //put your code here

    public static function uomValues() {
        return  array('g', 'kg', 'ml', 'l', 'eM', 'eL');
    }

    /**
     * pack values as regular select
     */
    public static function packLookup(){

        $packs  = Pack::all();

        return View::make('admin.pack.lookup')->with('packs', $packs);

    }
}

?>
