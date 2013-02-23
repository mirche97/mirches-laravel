<?php

class Create_Brand_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
            Schema::create('brands', function($table){
                $table->increments('id');
                $table->string('name');

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
            Schema::drop('brands');
	}

}