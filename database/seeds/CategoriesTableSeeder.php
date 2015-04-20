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
                'slug' => 'kitchen-appliances',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                
            ],
            [
                'id' => 2,
                'name' => 'DVD',
                'slug' => 'dvd',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 3,
                'name' => 'TV',
                'slug' => 'tv',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 4,
                'name' => 'Games',
                'slug' => 'games',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 5,
                'name' => 'Laptops',
                'slug' => 'laptops',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 6,
                'name' => 'Audio',
                'slug' => 'audio',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],

        );

        DB::table('categories')->insert($categories);
    }
}