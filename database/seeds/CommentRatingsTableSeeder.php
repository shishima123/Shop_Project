<?php

use App\CommentRating;
use Illuminate\Database\Seeder;

class CommentRatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CommentRating::class, 5)->create();
    }
}
