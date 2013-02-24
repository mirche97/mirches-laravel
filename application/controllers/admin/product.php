<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_Product_Controller extends Base_Controller
{

    public $restful = true;

    /**
     * indesx page
     * @return type
     */
    public function get_index() {


        $head['js'] = array();
        $head['js'][] = HTML::script('js/product.js');

        $ing = Ingridient::lookup();
        $packs = Pack::packLookup();
        $brands = Brand::lookup();

        return View::make('admin.product.index')
                ->with('head', $head)
                ->with('model', 'Producten')
                ->with('packlookup', $packs)
                ->with('ingridientlookup', $ing)
                ->with('brandlookup', $brands);

    }

    /**
     * load list
     * @return type
     */
    public function get_load() {
         $products = Product::all();

         return View::make('admin.product.list')
                ->with('products', $products);
    }
    /**
     * ajax add product
     * @return \Exception
     */
    public function post_add() {

        if (Input::has('ingridient_id') && Input::has('pack_id') && Input::has('brand_id')) {
            $product = new Product();
            $product->ingridient_id = Input::get('ingridient_id');
            $product->pack_id = Input::get('pack_id');
            $product->brand_id = Input::get('brand_id');

            //var_dump($ing); die();
            try {
                $product->save();
                $json['success']=true;
                $json['msg'] = "A new product saved";
            } catch (Exception $e) {
                return $e;
                $json['success']=false;
                $json['msg'] = "Saving product faild";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Saving product failed";
        }

        return json_encode($json);
    }


    public function post_delete(){
        if (Input::has('id')) {
            $ing = Product::find(Input::get('id'));
            if (is_object($ing)) {
                $ing->delete();
                $json['success']=true;
                $json['msg'] = "Product deleted";
            } else {
                $json['success']=false;
                $json['msg'] = "Deleting product failed";
            }
        } else {
            $json['success']=false;
            $json['msg'] = "Deleting product failed";
        }

        return json_encode($json);
    }
}

