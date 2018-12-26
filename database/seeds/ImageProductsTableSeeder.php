<?php

use App\ImageProduct;
use Illuminate\Database\Seeder;

class ImageProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ImageProduct::class, 20)->create();
    }
}
