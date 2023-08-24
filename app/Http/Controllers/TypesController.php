<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;


class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vehicles = Type::paginate(10);

        return view('cars/vehicles/vehicles_index' , compact('vehicles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars/vehicles/vehicles_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_name' => 'required'
        ]);
        // Create a new Car instance with the form data and associated vehicle and Type
        $vehicle = new Type([
            'vehicle_name' => $request->vehicle_name
        ]);

        // dd($vehicle);

        // Save
        $vehicle->save();

        return redirect()->route('vehicles.index');
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


            // Find the record by its ID
            $vehicle = Type::findOrFail($id);

            return view('cars/vehicles/vehicles_edit', compact('vehicle'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'vehicle_name' => 'required'
        ]);

        // Find the Car model instance by its ID
        $vehicle = Type::findOrFail($id);

        $vehicle->vehicle_name = $request->input('vehicle_name');

        // Save the changes to the database
        $vehicle->save();

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function deletePage(string $id)
     {
         //
         return view('cars/vehicles/vehicles_deletepage', compact('id'));
     }
     public function destroy(string $id)
    {
        //
        $vehicle = Type::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('vehicles.index');

    }}
