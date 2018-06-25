<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
    	'UserGroupID' => $faker->id,
        'email' => $faker->unique()->safeEmail,
        'PhoneNo' => $faker->phone,
        'UName' => $faker->username,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'FName' => $faker->name,
        'LName' => $faker->name,
        'Address' => $faker->address,
        'City' => $faker->city->default(0),
        'Country' => $faker->country->default(0),
        'ZipCode' => $faker->zipcode->default(751012),
        'Status' => $faker->status->default(0),
        'remember_token' => str_random(10),
    ];
});
