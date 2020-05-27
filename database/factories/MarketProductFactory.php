<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Market;
use App\MarketProduct;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(MarketProduct::class, function (Faker $faker) {
    return [
        'market_id' => Market::get()->random()->id,
        'product_id' => Product::get()->random()->id,
        'price' => $faker->randomNumber(),
        'created_by' => User::get()->random()->id,
    ];
});
