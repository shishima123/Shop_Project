<?php
use App\Category;
use App\CommentRating;
use App\Order;
use App\OrderItem;
use App\Product;
use App\User;
use Faker\Generator as Faker;

//use Illuminate\Foundation\Auth\User;
$factory->define(Product::class, function (Faker $faker) {
    $category = Category::where('id', '>', 3)->get()->random()->id;
    switch ($category) {
        case "4":
            $name = $faker->numerify('Asus VIVOBOOK ###');
            $picture = '/upload/avatarProduct/laptop-asus.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/asus1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/asus2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
        case "5":
            $name = $faker->numerify('‎Dell Inspiron ###');
            $picture = '/upload/avatarProduct/laptop-dell.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/dell1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/dell2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
        case "6":
            $name = $faker->numerify('HP Probook ###');
            $picture = '/upload/avatarProduct/laptop-hp.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/hp1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/hp2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
        case "7":
            $name = $faker->numerify('Lenovo Thinkpad ###');
            $picture = '/upload/avatarProduct/laptop-lenovo.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/lenovo1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/lenovo2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);

            break;
        case "8":
            $name = $faker->numerify('Iphone #');
            $picture = '/upload/avatarProduct/smartphone-iphone.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/iphone1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/iphone2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
        case "9":
            $name = $faker->numerify('Galaxy #');
            $picture = '/upload/avatarProduct/smartphone-samsung.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/samsung1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/samsung2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
        case "10":
            $name = $faker->numerify('Zenphone #');
            $picture = '/upload/avatarProduct/smartphone-asus.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/zenphone1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/zenphone2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
        case "11":
            $name = $faker->numerify('Nikon ###');
            $picture = '/upload/avatarProduct/camera.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/nikon1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/nikon2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
        case "12":
            $name = $faker->numerify('Beats ###');
            $picture = '/upload/avatarProduct/headphone.jpg';
            $content = $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/beat1.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500) . '<p><img alt="" src="http://localhost/shop_project/public/upload/imgDetailProduct/beat2.jpg" style="height:400px; width:400px" /></p>' . $faker->text($maxNbChars = 500);
            break;
    }
    return [
        'category_id' => $category,
        'name' => $name,
        'description' => $faker->text,
        'content' => $content,
        'price' => $faker->numberBetween($min = 500, $max = 900),
        'picture' => $picture,
        'unit' => $faker->randomDigit(),
        'sale' => $faker->randomElement($array = [
            '0', '10', '20',
        ]),
        'new' => $faker->randomElement($array = [
            '0', '1',
        ]),
        'rating' => 0,
        'top_selling' => $faker->randomElement($array = [
            '0', '1',
        ]),
    ];
});

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'role' => $faker->randomElement($array = [
            'administrator',
            'user',
        ]),
        'password' => bcrypt('12345'),
        'picture' => $faker->image(),
        'phone' => $faker->phoneNumber(),
        'address' => $faker->address(),
    ];
});

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'code_order' => $faker->creditCardNumber,
        'total' => $faker->numberBetween($min = 1000, $max = 2000),
        'status' => $faker->randomElement($array = [0, 1]),
        'order_name' => $faker->name,
        'order_address' => $faker->secondaryAddress,
        'order_phone' => $faker->phoneNumber,

    ];
});

$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'order_id' => Order::all()->random()->id,
        'product_id' => Product::all()->random()->id,
        'quantity' => $faker->numberBetween($min = 10, $max = 20),
        'price' => $faker->randomNumber(2),
        'total' => $faker->numberBetween($min = 500, $max = 700),

    ];
});

$factory->define(CommentRating::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'product_id' => Product::all()->random()->id,
        'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'rating' => $faker->randomElement($array = [
            '1', '2', '3', '4', '5',
        ]),
    ];
});
