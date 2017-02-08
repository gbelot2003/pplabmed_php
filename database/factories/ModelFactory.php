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

$factory->define(App\Area::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'status' => rand(0, 1)
    ];
});

$factory->define(App\Firma::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->word,
        'status' => rand(0, 1)
    ];
});

$factory->define(App\Categoria::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'status' => rand(0, 1)
    ];
});

$factory->define(App\Morfologia::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'status' => rand(0, 1)
    ];
});

$factory->define(App\Topologia::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'status' => rand(0, 1)
    ];
});

$factory->define(App\Gravidad::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'status' => rand(0, 1)
    ];
});

$factory->define(App\Factura::class, function (Faker\Generattor $faker){
    return [
        'factura' => $faker->rand(2000, 4000),
        'identidad' => $faker->personalIdentityNumber(),
        'nombre' => $faker->name(),
        'nacimiento' => $faker->dateTime(),
        'email' => $faker->freeEmail(),
        'direccion_entrega' => $faker->sentence(),
        'medico' => $faker->name(),
        'sexo' => $faker->title()
    ];
});


