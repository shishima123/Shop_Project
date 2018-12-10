<?php

namespace App\Http\Controllers;

use App\CommentRating;
use App\Order;
use App\OrderItem;
use App\User;

class UserController extends Controller
{
    public function show()
    {
        $users = User::leftJoin('comment_ratings',
            'users.id', '=', 'comment_ratings.user_id')->selectRaw('users.*,count(comment_ratings.user_id) as total_comment')->groupBy('users.id')->orderBy('role')->paginate(10);
        // return $users;
        return view('Admin.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.user.edit', compact('user'));
    }

    public function store()
    {
        return view('auth.register');
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        CommentRating::where('user_id', $id)->delete();

        $getOrders = $user->orders()->get();
        // return $getOrders;
        foreach ($getOrders as $getOrder) {
            OrderItem::where('order_id', $getOrder->id)->delete();
            // return 'a';
        }
        Order::where('user_id', $id)->delete();
        User::findorfail($id)->delete();
        return redirect()->route('admin.user.index');
    }
}
