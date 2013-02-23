<?php

class Create_Price_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
            Schema::create('prices', function($table){
                $table->increments('id');
                $table->integer('product_id');
                $table->integer('pack_id');
                $table->boolean('action');

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
            Schema::drop('prices');
	}

}