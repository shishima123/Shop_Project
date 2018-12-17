<?php

namespace App\Http\Controllers;

use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user:id,name')->orderBy('updated_at', 'DESC')->paginate(10);
        // return $orders;
        return view('Admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('user')->first();
        // return $order;
        return view('Admin.order.show', compact('order'));
    }
}
