<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserRelationToEachProductCreated extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->integer('user_id')
			->unsigned()
			->nullable();
			

			$table->foreign("user_id")
				->references("id")
					->on("users")
					->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function(Blueprint $table)
		{
			$table->dropForeign("products_user_id_foreign")->dropColumn('user_id');
		});
	}

}
