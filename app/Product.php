<?php

namespace App;

use App\Category;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')->withPivot(['quantity', 'price', 'total']);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'comment_ratings')->withPivot(['content', 'parent_id', 'rating']);
    }
}
