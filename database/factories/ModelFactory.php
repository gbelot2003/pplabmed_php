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

//$autoIncrement = autoIncrement();

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'status' => rand(0, 1),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Examenes::class, function (Faker\Generator $faker){
    return [
        'num_factura' => rand(100, 200),
        'item' => rand(100, 200),
        'nombre_examen' => $faker->words()
    ];
});

$factory->define(App\Factura::class, function (Faker\Generator $faker){
    return [
        'num_factura' => rand(100, 200),
        'num_cedula' => $faker->randomNumber(),
        'nombre_completo_cliente' => $faker->name(),
        'fecha_nacimiento' => $faker->dateTime(),
        'correo' => $faker->freeEmail(),
        'correo2' => $faker->freeEmail(),
        'direccion_entrega_sede' => $faker->sentence(),
        'medico' => $faker->name(),
        'status' => "Valida",
        'sexo' => $faker->title()
    ];
});


