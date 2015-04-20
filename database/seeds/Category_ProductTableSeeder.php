<?php

use Illuminate\Database\Seeder;

class Category_ProductTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('category_product')->delete();

        $category_product = array(
            [
                'product_id' => 1,
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                
            ],
            [
                'product_id' => 2,
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 3,
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 4,
                'category_id' => 5,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 4,
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 5,
                'category_id' => 6,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 5,
                'category_id' => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 6,
                'category_id' => 4,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 7,
                'category_id' => 3,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 8,
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 9,
                'category_id' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'product_id' => 10,
                'category_id' => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],

        );

        DB::table('category_product')->insert($category_product);
    }
}