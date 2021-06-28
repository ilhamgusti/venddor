<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Proyek;
use App\Models\Vendor;
use Faker\Generator as Faker;

$factory->define(Proyek::class, function (Faker $faker) {
    $ids = Vendor::pluck('id')->toArray();

    return [
        'nama_proyek' => $faker->name,
        'tanggal_pengerjaan' => $faker->date('Y-m-d'),
        'estimasi' => $faker->randomNumber(),
        'file_url' => $faker->imageUrl($width = 640, $height = 480),
        'status' => 0,
        'vendor_id'=> empty($ids) ? null : $faker->optional(0.4, null)->randomElement($ids)  // 10% chance of null
    ];
});
