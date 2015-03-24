<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultvalueToPictureOnProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function(Blueprint $table)
		{
    		$table->dropColumn('picture');
		});

		Schema::table('products', function(Blueprint $table)
		{
			$table->string('picture', 255)->default('includes/baseProduct.png');
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
    		$table->dropColumn('picture');
		});
		Schema::table('products', function(Blueprint $table)
		{
			$table->string('picture', 255);
		});
	}

}
