<?php

class Create_Pack_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
            Schema::create('packs', function($table){
                $table->increments('id');
                $table->integer('amount');
                $table->string('uom');
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
            Schema::drop('packs');
	}

}