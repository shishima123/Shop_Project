<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // factory(Category::class, 10)->create();

        $data = [
            [
                'name' => 'Laptops',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Smart phones',
                'picture' => './frontend/img/shop02.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Cameras',
                'picture' => './frontend/img/shop03.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Accessories',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Laptop 1',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 1,
            ],
            [
                'name' => 'Laptop 2',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 1,
            ],
            [
                'name' => 'Iphone',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 2,
            ],
            [
                'name' => 'Samsung',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 2,
            ],
            [
                'name' => 'Sony',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 2,
            ],
            [
                'name' => 'Camera 1',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 3,
            ],
            [
                'name' => 'Speaker',
                'picture' => './frontend/img/shop01.png',
                'parent_id' => 4,
            ],
        ];
        Category::insert($data);
    }
}
