<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Stocke;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;

class StockeController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function search(Request $request)
     {
        $query = $request->input('query');
        
        // Use paginate instead of get()
        $stocks = Stocke::where('ingredient_name', 'LIKE', '%' . $query . '%')->paginate(10);
 
         return view('admin.Stockes.list', compact('stocks', 'query'));
     }





    public function index()
    {
        $stocks = Stocke::paginate(10);
        return view('admin.Stockes.list' , compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $menus = Menu::paginate(10);
        return view('admin.Stockes.create' , compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockRequest $request)
    {
        Stocke::create([
            'menu_id' => $request->input('menu_id'),
            'ingredient_name' => $request->input('ingredient_name'),
            'quantity' => $request->input('quantity'),
            'alert_threshold' => $request->input('alert_threshold'),
        ]);

        // Redirect to a success page or elsewhere
        return redirect()->route('stockes.index')->with('success', 'Stock item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(stocke $stocke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stocke $stock , $id)
    {
        $menus = Menu::find($id)->paginate(10);
        $stock = Stocke::findOrFail($id);
        return view('admin.Stockes.edit', compact('stock' , 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StockRequest $request, $id)
    {
         $stock = Stocke::findOrFail($id);

        // Update the stock record with the validated request data
        $stock->update($request->validated());

        return response()->json(['message' => 'Stock updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stock = Stocke::findOrFail($id);

        // Delete the stock record
        $stock->delete();

        return redirect()->back();
    
    }
}
