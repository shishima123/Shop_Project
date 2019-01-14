<?php

namespace App;

use App\CommentRating;
use App\Order;
use App\Product;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'comment_ratings')->withPivot(['content', 'rating', 'created_at']);
    }
    public function comment_ratings()
    {
        return $this->hasMany(CommentRating::class);
    }
}
