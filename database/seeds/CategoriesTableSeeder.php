<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('categories')->delete();

        $categories = array(
            [
                'id' => 1,
                'name' => 'Kitchen appliances',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 2,
                'name' => 'DVD',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 3,
                'name' => 'TV',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 4,
                'name' => 'Games',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 5,
                'name' => 'Laptops',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 6,
                'name' => 'Audio',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],

        );

        DB::table('categories')->insert($categories);
    }
}