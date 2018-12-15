<?php

namespace App\Http\Controllers;

use App\CommentRating;
use App\Order;
use App\OrderItem;
use App\User;
use Illuminate\Http\Request;

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
        $user = User::where('id', $id)->with('products')->first();
        // return $user;
        return view('Admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // return $request;
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()->route('user.index');
    }

    public function store(Request $request)
    {
        // return $request;
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('user.index');
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
        return redirect()->route('user.index');
    }
}
