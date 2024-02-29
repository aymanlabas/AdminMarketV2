<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
       $query = $request->input('query');
       
       // Use paginate instead of get()
       $orders = Order::where('id', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('admin.Orders.list', compact('orders', 'query'));
    }




    public function index()
    {
        $customer = Customer::all();
        $orders = Order::paginate(10);
        return view('admin.Orders.list' , compact('orders' , 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.Orders.create' , compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create([
            'customer_id' => $request->input('customer_id'),
            'order_reference' => $request->input('order_reference'),
            'status' => $request->input('status', 'pending'), // Default to 'pending' if not provided
           // 'special_requests' => $request->input('special_requests'),
        ]);

        // Redirect to a success page or elsewhere
        return redirect()->route('orders.index')->with('success', 'Order added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    { 
         $customer = Customer::all();
        $order = Order::findOrFail($id);
        // Return the view or JSON response for editing the order
        return view('admin.Orders.edit', compact('order' , 'customer')); // Adjust the view name as needed
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Update the order with the validated request data
        $order->update($request->validated());

        return response()->json(['message' => 'Order updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back();
    }
}
