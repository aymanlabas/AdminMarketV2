<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Http\Request;

class OrderitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $orders = Order::all();
        $menus = Menu::all();
        return view('admin.Orderitem.create' , compact('menus' , 'orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = Menu::all();
        OrderItem::create([
            'order_id' => $request->input('order_id'),
            'menu_id' => $request->input('menu_id'),
            'quantity' => $request->input('quantity'),
                        // If you want to calculate subtotal, uncomment the line below

            //'subtotal' => $request->input('quantity'),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Orderitem $orderitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orderitem $orderitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orderitem $orderitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orderitem $orderitem)
    {
        //
    }
}
