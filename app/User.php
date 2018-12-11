<?php

namespace App;

use App\CommentRating;
use App\Order;
use App\Product;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'comment_ratings')->withPivot(['content', 'parent_id', 'rating']);
    }
    public function comment_ratings()
    {
        return $this->hasMany(CommentRating::class);
    }
}
