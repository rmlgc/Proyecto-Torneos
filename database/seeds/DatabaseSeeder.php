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

            //Usuarios
        DB::table('users')->insert([
            'name' => "root",
            'email' => "root".'@gmail.com',
            'password' => bcrypt('3xc4l1bur'),
            'role' => "admin",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin".'@gmail.com',
            'role' => "admin",
            'password' => bcrypt('u12345'),
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => "rommel",
            'email' => "rommel".'@gmail.com',
            'password' => bcrypt('12345'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => "Alvaro",
            'email' => "alvaro".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => "LilRomi",
            'email' => "baron".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "KRL",
            'email' => "krl".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Sergi",
            'email' => "sergi".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Roy",
            'email' => "roy".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Droga",
            'email' => "droga".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Puma",
            'email' => "puma".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Itsmiinthenight",
            'email' => "itsmiin".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Colt",
            'email' => "colt".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Josemi",
            'email' => "josemi".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Ge",
            'email' => "ge".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Simo",
            'email' => "simo".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Xavi",
            'email' => "alvaro".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Ofroud",
            'email' => "ofroud".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Protta",
            'email' => "protta".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Indra",
            'email' => "indra".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Alguien",
            'email' => "alguien".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "LePutoMigueAnge",
            'email' => "puto".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Pibito",
            'email' => "pibito".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Imanol",
            'email' => "imanol".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "ACV",
            'email' => "acv".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "TrapKing",
            'email' => "king".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Bertoke",
            'email' => "bertoke".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'name' => "Beckmann",
            'email' => "beckmann".'@gmail.com',
            'password' => bcrypt('secret'),
            'role' => "mc",
            'created_at' => today(),
            'updated_at' => today(),
            'remember_token' => str_random(10),
        ]);


$faker = Faker::create();


        for ($i=0; $i < 6 ; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'surname' => str_random(10),
                'password' => bcrypt('secret'),
                'created_at' => today(),
                'updated_at' => today(),
                'remember_token' => str_random(10),
            ]);
        }


        //Tipo de categoria
        DB::table('type_category')->insert([
            'name' => "1v1",
        ]);

        DB::table('type_category')->insert([
            'name' => "2v2",
        ]);

        DB::table('type_category')->insert([
            'name' => "3v3",
        ]);

        DB::table('type_category')->insert([
            'name' => "1vX",
        ]);

        DB::table('type_category')->insert([
            'name' => "OneForAll",
        ]);

         //Tematica para la categoria
         DB::table('tematica_category')->insert([
            'name' => "free",
        ]);

        DB::table('tematica_category')->insert([
            'name' => "concepto",
        ]);

        DB::table('tematica_category')->insert([
            'name' => "palabras",
        ]);

        DB::table('tematica_category')->insert([
            'name' => "objetos",
        ]);

        //patrones para la categoria
        DB::table('patrones_category')->insert([
            'name' => "4x4",
        ]);

        DB::table('patrones_category')->insert([
            'name' => "16Barras",
        ]);

        //Torneo Level:
        DB::table('tournament_level')->insert([
            'name' => "N/D",
        ]);

        DB::table('tournament_level')->insert([
            'name' => "local",
        ]);

        DB::table('tournament_level')->insert([
            'name' => "municipal",
        ]);

        DB::table('tournament_level')->insert([
            'name' => "regional",
        ]);

        DB::table('tournament_level')->insert([
            'name' => "nacional",
        ]);

        DB::table('tournament_level')->insert([
            'name' => "internacional",
        ]);
    }
}
