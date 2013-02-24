<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_Ingridient_Controller extends Base_Controller
{

    public $restful = true;

    /**
     * indesx page
     * @return type
     */
    public function get_index() {


        $head['js'] = array();
        $head['js'][] = HTML::script('js/ingridient.js');



        return View::make('admin.ingridient.index')
                ->with('head', $head)
                ->with('model', 'Ingridienten');

    }

    /**
     * load list
     * @return type
     */
    public function get_load() {
         $ingridients = Ingridient::all();
         return View::make('admin.ingridient.list')
                ->with('ingridients', $ingridients);
    }
    /**
     * ajax add ingridient
     * @return \Exception
     */
    public function post_add() {

        if (Input::has('name')) {
            $ing = new Ingridient();
            $ing->name = Input::get('name');

            //var_dump($ing); die();
            try {
                $ing->save();
                $json['success']=true;
                $json['msg'] = "A new ingridient saved";
            } catch (Exception $e) {
                return $e;
                $json['success']=false;
                $json['msg'] = "Saving ingridient faild";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Saving ingridient failed";
        }

        return json_encode($json);
    }


    public function post_delete(){
        if (Input::has('id')) {
            $ing = Ingridient::find(Input::get('id'));
            if (is_object($ing)) {
                $ing->delete();
                $json['success']=true;
                $json['msg'] = "Ingridient deleted";
            } else {
                $json['success']=false;
                $json['msg'] = "Deleting ingridient failed";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Deleting ingridient failed";
        }

        return json_encode($json);
    }

    /**
     * ingridient lookup as json object
     */
    public function get_lookup() {
        $ingridients  = Ingridient::all();

        $json = array();

        foreach ($ingridients as $ing) {
            $json[] = array('id' => $ing->id, 'text' => $ing->name);
        }

        return json_encode($json);
    }

}

