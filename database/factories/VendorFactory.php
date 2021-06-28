<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vendor;
use App\User;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'kode_vendor' => $faker->uuid,
        'alamat' => $faker->address,
        'user_id'=> factory(User::class)->create([
            'role' => 5
        ])->id
    ];
});