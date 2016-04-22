<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('description');
			$table->integer('type');
			$table->double('amount');
			$table->date('date');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('user_id')
				  ->references('id')->on('users')
				  ->onDelete('cascade');
				  
			$table->foreign('type')
				  ->references('id')->on('types')
				  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('types');
		Schema::drop('transactions');
	}

}
