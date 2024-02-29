<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function search(Request $request)
     {
        $query = $request->input('query');
        
        // Use paginate instead of get()
        $invoices = Invoice::where('id', 'LIKE', '%' . $query . '%')->paginate(10);
        $invoices = Invoice::where('payment_status', 'LIKE', '%' . $query . '%')->paginate(10);

 
         return view('admin.Invoices.list', compact('invoices', 'query'));
     }




    public function index()
    {
        $invoices = Invoice::paginate(10);
        return view('admin.Invoices.list', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        return view('admin.Invoices.create' , compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        

        // Create a new invoice
        $invoice = Invoice::create([
            'order_id' => $request->order_id,
            'total_amount' => $request->total_amount,
            'payment_status' => $request->payment_status,
        ]);

        // You can optionally return a response, redirect, or perform any other actions here
        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view('invoice.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
