<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('password'),
        'remember_token' => Str::random(10),
    ];
});
