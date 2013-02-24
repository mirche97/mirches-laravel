<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author mirche
 */
class Product extends Eloquent
{
    //put your code here
    public $includes = array('ingridient', 'pack', 'brand');

    public function ingridient() {

        return  $this->belongs_to('Ingridient');
    }

    public function pack() {
        return  $this->belongs_to('Pack');
    }

    public function brand() {
        return  $this->belongs_to('Brand');
    }
}

?>
