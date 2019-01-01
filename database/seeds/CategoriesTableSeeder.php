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
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Smart phones',
                'picture' => '/upload/imgCategory/shop02.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Cameras',
                'picture' => '/upload/imgCategory/shop03.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Accessories',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 0,
            ],
            [
                'name' => 'Laptop 1',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 1,
            ],
            [
                'name' => 'Laptop 2',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 1,
            ],
            [
                'name' => 'Iphone',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 2,
            ],
            [
                'name' => 'Samsung',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 2,
            ],
            [
                'name' => 'Sony',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 2,
            ],
            [
                'name' => 'Camera 1',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 3,
            ],
            [
                'name' => 'Speaker',
                'picture' => '/upload/imgCategory/shop01.png',
                'parent_id' => 4,
            ],
        ];
        Category::insert($data);
    }
}
