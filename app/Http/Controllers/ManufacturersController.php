<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $manufacturers = Manufacturer::paginate(10);
        return view('cars/manufacturers/manufacturers_index' , compact('manufacturers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars/manufacturers/manufacturers_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer_name' => 'required'
        ]);
        // Create a new Car instance with the form data and associated Manufacturer and Type
        $manufacturer = new Manufacturer([
            'manufacturer_name' => $request->manufacturer_name
        ]);

        // dd($manufacturer);

        // Save
        $manufacturer->save();

        return redirect()->route('manufacturers.index');
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

            // Find the record by its ID
            $manufacturer = Manufacturer::findOrFail($id);
            return view('cars/manufacturers/manufacturers_edit', compact('manufacturer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'manufacturer_name' => 'required'
        ]);

        // Find the Car model instance by its ID
        $manufacturer = Manufacturer::findOrFail($id);

        $manufacturer->manufacturer_name = $request->input('manufacturer_name');

        // Save the changes to the database
        $manufacturer->save();

        return redirect()->route('manufacturers.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function deletePage(string $id)
     {
         //
         return view('cars/manufacturers/manufacturers_deletepage', compact('id'));
     }
     public function destroy(string $id)
    {
        //
        $manufacturer = Manufacturer::findOrFail($id);
        $manufacturer->delete();
        return redirect()->route('manufacturers.index');

    }
}
