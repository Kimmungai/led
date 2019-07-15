<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Org::class, 100)->create();
        factory(App\User::class, 1)->create();
        factory(App\Purchase::class, 2)->create();
        factory(App\Sale::class, 2)->create();
        factory(App\Product::class, 2)->create();
    }
}
