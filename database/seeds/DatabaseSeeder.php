<?php

use App\User;
use App\Market;
use App\Product;
use App\MarketProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create();
        factory(Market::class, 2)->create();
        factory(Product::class, 3)->create();
    }
}
