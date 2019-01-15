<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(CommentRatingsTableSeeder::class);
        $this->call(ImageProductsTableSeeder::class);
        $this->call(ImageProductsTableSeeder::class);
        $this->call(UpdateRatingSeeder::class);
    }
}
