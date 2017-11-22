<?php

use Illuminate\Database\Seeder;


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

        //factory(Mascotas\Mercaderia::class, 10)->create();
        
        //$this->call(TercerosTableSeeder::class);
        /*
        factory(Mascotas\User::class, 10)->create();
        
        //crea 50 tareas

        factory(Mascotas\Tercero::class, 3)->create();

        factory(Mascotas\Mercaderia::class, 4)->create();
        
        factory(Mascotas\Book::class, 4)->create();
        */
        factory(Mascotas\Task::class, 12)->create();
    }
}
