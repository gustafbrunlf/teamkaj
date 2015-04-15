<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('products')->delete();

        $products = array(
            [
                'id' => 1,
                'name' => 'Microwave-oven',
                'price' => '200',
                'stock' => '10',
                'description' => 'Heat your food with the power of microwaves. Extreme!',
                'artNo' => '100001',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'microwave-oven',
                'user_id' => 2,
            ],
            [
                'id' => 2,
                'name' => 'Toaster',
                'price' => '100',
                'stock' => '200',
                'description' => 'Your bread was not baked enough. Toast it!',
                'artNo' => '100002',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'toaster',
                'user_id' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Dishwasher',
                'price' => '500',
                'stock' => '20',
                'description' => 'Blast your silverware with scalding water to wash away its sins. Ouch!',
                'artNo' => '100003',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'dishwasher',
                'user_id' => 2,
            ],
            [
                'id' => 4,
                'name' => 'Laptop',
                'price' => '1000',
                'stock' => '50',
                'description' => "Now you can sit in that fancy coffee-place and work on your novel. It's gonna be a best-seller for sure!",
                'artNo' => '100004',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'laptop',
                'user_id' => 3,
            ],
            [
                'id' => 5,
                'name' => 'Headphones',
                'price' => '20',
                'stock' => '80',
                'description' => 'The sound is great enough to make sure everyone around you knows what kind of music you listen to.',
                'artNo' => '100005',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'headphones',
                'user_id' => 3,
            ],
            [
                'id' => 6,
                'name' => 'World of Warcraft',
                'price' => '50',
                'stock' => '5000',
                'description' => "In real life you may be just a common architect. But in here, you're Falcor, a proud defender of the Alliance.",
                'artNo' => '100006',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'world-of-warcraft',
                'user_id' => 3,
            ],
            [
                'id' => 7,
                'name' => '3D-TV',
                'price' => '3000',
                'stock' => '40',
                'description' => 'You may look ridiculous wearing those glasses. But the immersion is absolute!',
                'artNo' => '100007',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => '3D-TV',
                'user_id' => 1,
            ],
            [
                'id' => 8,
                'name' => 'Espresso Machine',
                'price' => '300',
                'stock' => '20',
                'description' => 'When a regular, hard-working, honest coffe-maker is not good enough.',
                'artNo' => '100008',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'espresso-machine',
                'user_id' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Deep-fryer',
                'price' => '200',
                'stock' => '35',
                'description' => "When you have one of these, you really don't need any other cooking supplies.",
                'artNo' => '100009',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'deep-fryer',
                'user_id' => 1,
            ],
            [
                'id' => 10,
                'name' => 'Game of Thrones, season 5 box',
                'price' => '2000',
                'stock' => '5',
                'description' => 'Spoiler: The dwarf dies.',
                'artNo' => '100010',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'slug' => 'game-of-thrones,-season-5-box',
                'user_id' => 1,
            ],
        );

        DB::table('products')->insert($products);
    }
}