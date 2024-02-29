<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menus;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     
     
     public function search(Request $request)
     {
        $query = $request->input('query');
        
        // Use paginate instead of get()
        $menus = Menu::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
 
         return view('admin.Menus.list', compact('menus', 'query'));
     }

     
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('admin.Menus.list' , compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.Menus.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {

        Menu::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'availability' => $request->has('availability'),
        ]);
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Categorie::all();

        $menus = Menu::findOrFail($id);
        return view('admin.Menus.edite', compact('menus' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);

        // Update the menu item with the request data
        $menu->update($request->all());

        return redirect()->route('menus.index');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Delete the menu item
        $menu->delete();

        return response()->back();
    }
}
