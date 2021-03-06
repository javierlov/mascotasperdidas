<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Mascotas\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Mascotas\Task::class, function (Faker\Generator $faker) {    
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'user_id' => $faker->numberBetween(1,4), 
        /*function(){
            //return factory(Mascotas\User::class)->create()->id;
            return App\User::first()->id;
        }*/
    ];
});


$factory->define(Mascotas\Tercero::class, function (Faker\Generator $faker) {    
    return [
        'nit' => $faker->numberBetween(1,1000),
        'nombre' => $faker->name,
        'rol' => 'cliente',
        'direccion' => $faker->city,
        'email' => $faker->email,
        'notas' => $faker->text,     
    ];
});


$factory->define(Mascotas\Mercaderia::class, function (Faker\Generator $faker) {
    return [
        'codigo' => $faker->numberBetween(1,1000),
        'tipo' => $faker->word,
        'tercero_id' => $faker->numberBetween(1,4),   
        /*function(){
            return factory(Mascotas\Tercero::class)->create()->id;
        },*/
        'estado' => 'vacio',
        'user_id' => $faker->numberBetween(1,4),   
        /*function(){
            return factory(Mascotas\User::class)->create()->id;
        },*/
        'amount' => $faker->randomDigit      
    ];
});



$factory->define(Mascotas\Book::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'pages' => $faker->randomDigit,
        'isbn' => $faker->postcode,
    ];
});
