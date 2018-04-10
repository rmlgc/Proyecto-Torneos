<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

  /*      DB::table('users')->insert([
            'name' => "root",
            'email' => "root".'@gmail.com',
            'password' => "3xc4l1bur",
            'role' => "admin",
        ]);
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin".'@gmail.com',
            'role' => "admin",
            'password' => "u12345",
        ]);

$faker = Faker::create();
        for ($i=0; $i < 4 ; $i++) {
            $surname="";
            if ($i % 2 == 0) {
                $surname = str_random(10);
            }
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'surname' => $surname,
                'role' => "mc",
                'password' => bcrypt('secret'),
            ]);
        }

        for ($i=0; $i < 4 ; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'surname' => str_random(10),
                'password' => bcrypt('secret'),
            ]);
        }

*/

    }
}
