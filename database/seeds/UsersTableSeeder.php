<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('users')->delete();

        $users = array(
            [
                'id' => 1,
                'name' => 'Super',  
                'email' => 'super@test.se',
                'password' => Hash::make('password'),
                'user_type' => 0,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 2,
                'name' => 'Admin1',  
                'email' => 'admin1@test.se',
                'password' => Hash::make('password'),
                'user_type' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'id' => 3,
                'name' => 'Admin2',  
                'email' => 'admin2@test.se',
                'password' => Hash::make('password'),
                'user_type' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        );

        DB::table('users')->insert($users);
    }
}