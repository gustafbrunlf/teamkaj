<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAll extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('products_in_category');
		Schema::dropIfExists('category_product');
		Schema::dropIfExists('categories');
		Schema::dropIfExists('products');
		Schema::dropIfExists('users');
		Schema::dropIfExists('password_resets');
		DB::table('migrations')->truncate();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('products');
	}

}
