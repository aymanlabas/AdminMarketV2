<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Requests\CategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function search(Request $request)
     {
        $query = $request->input('query');
        
        // Use paginate instead of get()
        $categories = Categorie::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
 
         return view('admin.Categories.list', compact('categories', 'query'));
     }


    public function index()
    {
        $categories = Categorie::paginate(10);
        return view('admin.Categories.list' , compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieRequest $request)
    {
        Categorie::Create(["name" => $request->name]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie , $id)
    {
        $categories = Categorie::find($id);
        return view('admin.Categories.edite' , compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieRequest $request, $id )
    {
       

        $categories = Categorie::findOrFail($id);
        $categories->name = $request->input('name');
        $categories->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie , $id)
    {
        $categories = Categorie::findOrFail($id);
        $categories->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
