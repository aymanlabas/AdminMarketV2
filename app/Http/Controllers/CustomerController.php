<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request)
    {
       $query = $request->input('query');
       
       // Use paginate instead of get()
       $customers = Customer::where('name'  , 'LIKE', '%' . $query . '%')->paginate(10);
      $customers = Customer::where('email'  , 'LIKE', '%' . $query . '%')->paginate(10);


        return view('admin.Cutomers.list', compact('customers', 'query'));
    }





    public function index()
    {
        $customers = Customer::with('orders')->paginate(10);
        return view('admin.Cutomers.list' , compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Cutomers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customers = Customer::find($id);
        return view('admin.Cutomers.edite', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( CustomerRequest $request , $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->update($request->validated());

        return redirect()->route('customers.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer = Customer::findOrfail($id);
        $customer->delete();
        return redirect()->back();
    }
}
