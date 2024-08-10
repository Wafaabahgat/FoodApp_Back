<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::all();
        $orderitemdata = OrderItem::all();
        return view(
            'layout.admin.Orders.index',
            [
                'data' => $data,
                'orderitemdata' => $orderitemdata
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $restaurant = Restaurant::all();
        $user = Admin::all();


        return view(
            'layout.admin.Orders.create',
            compact('order', 'restaurant', 'user')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}