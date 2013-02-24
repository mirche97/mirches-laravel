<?php

class Create_Product_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
            //
            Schema::create('products', function($table){
                $table->increments('id');
                $table->integer('ingridient_id');
                $table->integer('brand_id');
                $table->string('desc', 255);
                $table->timestamps();
            });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
            Schema::drop('products');
	}

}