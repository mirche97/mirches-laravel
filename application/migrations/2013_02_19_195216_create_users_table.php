<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
            Schema::create('users', function($table) {
                $table->increments('id');
                $table->string('username');
                $table->string('password');
                $table->string('email');
                $table->boolean('active');
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
            Schema::drop('users');
	}

}