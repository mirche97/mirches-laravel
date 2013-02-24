<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_Pack_Controller extends Base_Controller
{

    public $restful = true;

    /**
     * indesx page
     * @return type
     */
    public function get_index() {


        $head['js'] = array();
        $head['js'][] = HTML::script('js/pack.js');

        $uom = self::uomLookup();

        return View::make('admin.pack.index')
                ->with('head', $head)
                ->with('model', 'Verpakkingen')
                ->with('uom', $uom);

    }

    /**
     * load list
     * @return type
     */
    public function get_load() {
         $packs = Pack::all();
         return View::make('admin.pack.list')
                ->with('packs', $packs);
    }
    /**
     * ajax add pack
     * @return \Exception
     */
    public function post_add() {

        if (Input::has('amount') && Input::has('uom')) {
            $pack = new Pack();
            $pack->amount = Input::get('amount');
            $pack->uom = Input::get('uom');

            //var_dump($ing); die();
            try {
                $pack->save();
                $json['success']=true;
                $json['msg'] = "A new pack saved";
            } catch (Exception $e) {
                return $e;
                $json['success']=false;
                $json['msg'] = "Saving pack faild";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Saving pack failed";
        }

        return json_encode($json);
    }


    public function post_delete(){
        if (Input::has('id')) {
            $ing = Pack::find(Input::get('id'));
            if (is_object($ing)) {
                $ing->delete();
                $json['success']=true;
                $json['msg'] = "Pack deleted";
            } else {
                $json['success']=false;
                $json['msg'] = "Deleting pack failed";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Deleting pack failed";
        }

        return json_encode($json);
    }

    public function get_uom() {

        return Pack::uomValues();
    }

    public static function uomLookup(){

    $uom = Pack::uomValues();

    return View::make('base.uom_lookup')->with('uom', $uom);


}
}

