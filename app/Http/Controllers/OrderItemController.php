<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function create(OrderItem $orderI)
    {
        $dish = Dish::all();
        $orderitem = Order::all();

        return view(
            'layout.admin.Orders.create',
            compact('dish', 'orderitem','orderI')
        );
    }
}