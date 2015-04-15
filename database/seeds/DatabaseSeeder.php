<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		$this->call('UsersTableSeeder');
        $this->command->info('Users table seeded!');

		$this->call('ProductsTableSeeder');
        $this->command->info('Products table seeded!');

        $this->call('CategoriesTableSeeder');
        $this->command->info('Categories table seeded!');

        $this->call('Category_ProductTableSeeder');
        $this->command->info('Category_Product table seeded!');



	}

}
