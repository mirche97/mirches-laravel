<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_Brand_Controller extends Base_Controller
{

    public $restful = true;

    /**
     * indesx page
     * @return type
     */
    public function get_index() {


        $head['js'] = array();
        $head['js'][] = HTML::script('js/brand.js');



        return View::make('admin.brand.index')
                ->with('head', $head)
                ->with('model', 'Merken');

    }

    /**
     * load list
     * @return type
     */
    public function get_load() {
         $brands = Brand::all();
         return View::make('admin.brand.list')
                ->with('brands', $brands);
    }
    /**
     * ajax add brand
     * @return \Exception
     */
    public function post_add() {

        if (Input::has('name')) {
            $ing = new Brand();
            $ing->name = Input::get('name');

            //var_dump($ing); die();
            try {
                $ing->save();
                $json['success']=true;
                $json['msg'] = "A new brand saved";
            } catch (Exception $e) {
                return $e;
                $json['success']=false;
                $json['msg'] = "Saving brand faild";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Saving brand failed";
        }

        return json_encode($json);
    }


    public function post_delete(){
        if (Input::has('id')) {
            $ing = Brand::find(Input::get('id'));
            if (is_object($ing)) {
                $ing->delete();
                $json['success']=true;
                $json['msg'] = "Brand deleted";
            } else {
                $json['success']=false;
                $json['msg'] = "Deleting brand failed";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Deleting brand failed";
        }

        return json_encode($json);
    }
}

