<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function search(Request $request)
     {
        $query = $request->input('query');
        
        // Use paginate instead of get()
        $personnels = Personnel::where('id', 'LIKE', '%' . $query . '%')->paginate(10);
        $personnels = Personnel::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
        $personnels = Personnel::where('role', 'LIKE', '%' . $query . '%')->paginate(10);
        $personnels = Personnel::where('schedule', 'LIKE', '%' . $query . '%')->paginate(10);
       $personnels = Personnel::where('performance', 'LIKE', '%' . $query . '%')->paginate(10);

 
         return view('admin.Personnel.list', compact('personnels', 'query'));
     }

    
     public function index()
    {
        $personnels = Personnel::paginate(10);
         return view('admin.Personnel.list' , compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Presonnel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personnel = Personnel::create([
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'schedule' => $request->input('schedule'),
            'performance' => $request->input('performance'),
        ]);

        return redirect()->route('personnel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnel $personnel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel)
    {
        //
    }
}
