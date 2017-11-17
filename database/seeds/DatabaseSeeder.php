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
        
        //crea 50 tareas
        //factory(App\Task::class, 10)->create();
        
        //factory(App\Mercaderia::class, 10)->create();
        
        //$this->call(TercerosTableSeeder::class);
        //factory(App\Tercero::class, 3)->create();

        factory(App\Mercaderia::class, 4)->create();
    }
}
