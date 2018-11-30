<?php

namespace App;

use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'comment_ratings')->withPivot(['content', 'parent_id', 'rating']);
    }
}
