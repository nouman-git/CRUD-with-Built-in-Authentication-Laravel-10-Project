<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacturer;
use App\Models\Type;
use Database\Factories\CarFactory;
use Illuminate\Http\Request;

class CarsController extends Controller
{ /**
  * Display a listing of the resource.
  */
    public function index(Request $request)
    {

        //     $pageRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&($_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0' ||  $_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache');
        // if($pageRefreshed == 1){
        //      dd("Yes page Refreshed") ;
        // }

        // Retrieve manufacturer and type for filters
        $manufacturers = Manufacturer::all();
        $types = Type::all();

        // Initialize an empty array to store the filter parameters
        $filterParams = [];

        // Clear filters when navigating to the page or refreshing
        if (
            !$request->has('manufacturers')
            && !$request->has('types')
            && !$request->has('minPriceRange')
            && !$request->has('maxPriceRange')
        ) {
            $request->session()->forget(['manufacturersFilter', 'typesFilter', 'minPriceRange', 'maxPriceRange']);
            $filterParams = []; // Clear filter parameters
        }

        // Check if filters are present in the request then update
        if ($request->has('manufacturers')) {
            $manufacturersFilter = $request->input('manufacturers');
            $request->session()->put('manufacturersFilter', $manufacturersFilter);
            $filterParams['manufacturers'] = $manufacturersFilter;
        }

        if ($request->has('types')) {
            $typesFilter = $request->input('types');
            $request->session()->put('typesFilter', $typesFilter);
            $filterParams['types'] = $typesFilter;
        }

        if ($request->has('minPriceRange')) {
            $minPriceRange = $request->input('minPriceRange');
            $request->session()->put('minPriceRange', $minPriceRange);
            $filterParams['minPriceRange'] = $minPriceRange;
        }

        if ($request->has('maxPriceRange')) {
            $maxPriceRange = $request->input('maxPriceRange');
            $request->session()->put('maxPriceRange', $maxPriceRange);
            $filterParams['maxPriceRange'] = $maxPriceRange;
        }

        // Check if filters are present in the session
        if ($request->session()->has('manufacturersFilter')) {
            $manufacturersFilter = $request->session()->get('manufacturersFilter');
        }

        if ($request->session()->has('typesFilter')) {
            $typesFilter = $request->session()->get('typesFilter');
        }

        if ($request->session()->has('minPriceRange')) {
            $minPriceRange = $request->session()->get('minPriceRange');
        }

        if ($request->session()->has('maxPriceRange')) {
            $maxPriceRange = $request->session()->get('maxPriceRange');
        }

        // All cars (ORM)
        $carsQuery = Car::with(['manufacturer', 'type'])->orderBy('id', 'desc');

        // Apply filters if they are not empty
        if (!empty($manufacturersFilter)) {
            $carsQuery->whereIn('manufacturer_id', $manufacturersFilter);
        }

        if (!empty($typesFilter)) {
            $carsQuery->whereIn('type_id', $typesFilter);
        }

        if (!empty($minPriceRange)) {
            $carsQuery->where('price', '>=', $minPriceRange);
        }

        if (!empty($maxPriceRange)) {
            $carsQuery->where('price', '<=', $maxPriceRange);
        }

        // Paginate the results with appended filter parameters
        $cars = $carsQuery->paginate(10)->appends($filterParams);

        return view('cars.index', compact('cars', 'manufacturers', 'types'));
    }





    // method to clear filters
    public function clearFilters(Request $request)
    {
        $request->session()->forget(['manufacturersFilter', 'typesFilter']);

        // Redirect back to the index page without filter parameters in the URL
        return redirect()->route('cars.index');
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $manufacturerNames = Manufacturer::pluck('manufacturer_name');
        $vehicleNames = Type::pluck('vehicle_name');

        return view('cars.create', compact('manufacturerNames', 'vehicleNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'owner' => 'required',
            'manufacturer' => 'required',
            'type' => 'required',
            'price' => 'required|numeric'
        ]);

        // Retrieve or create the Manufacturer model based on the input manufacturer name
        $manufacturer = Manufacturer::firstOrCreate(['manufacturer_name' => $request->input('manufacturer')]);
        // Retrieve or create the Type model based on the input type name
        $type = Type::firstOrCreate(['vehicle_name' => $request->input('type')]);
        // dd($type);

        // Create a new Car instance with the form data and associated Manufacturer and Type
        $car = new Car([
            'owner' => $request->input('owner'),
            'manufacturer_id' => $manufacturer->id,
            'type_id' => $type->id,
            'price' => $request->input('price')
        ]);

        // dd($car);

        // Save the car instance to the database
        $car->save();

        return redirect()->route('cars.index');
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
        try {
            // Find the car record by its ID
            $car = Car::findOrFail($id);

            // Get unique manufacturer names from the database
            $manufacturerNames = Manufacturer::distinct('manufacturer_name')->pluck('manufacturer_name');

            // Get unique vehicle types from the database
            $vehicleNames = Type::distinct('vehicle_name')->pluck('vehicle_name');

            // Pass the car data, manufacturer names, and vehicle types to the 'cars.edit' view
            return view('cars.edit', compact('car', 'manufacturerNames', 'vehicleNames'));
        } catch (\Exception $e) {
            // Handle exceptions, e.g., show an error message or redirect
            return redirect()->route('cars.index')->with('error', 'Car not found');
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'owner' => 'required',
            'manufacturer' => 'required',
            'type' => 'required',
            'price' => 'required|numeric'
        ]);

        // Find the Car model instance by its ID
        $car = Car::findOrFail($id);

        // Retrieve the manufacturer and type models based on the input data
        $manufacturer = Manufacturer::firstOrCreate(['manufacturer_name' => $request->input('manufacturer')]);
        $type = Type::firstOrCreate(['vehicle_name' => $request->input('type')]);

        // Update the attributes of the car model instance
        $car->owner = $request->input('owner');
        $car->manufacturer_id = $manufacturer->id;
        $car->type_id = $type->id;
        $car->price = $request->input('price');

        // Save the changes to the database
        $car->save();

        return redirect()->route('cars.index');
    }



    /**
     * Remove the specified resource from storage.
     */


    public function deletePage(string $id)
    {
        //
        return view('cars.deletepage', compact('id'));
    }


    public function destroy(string $id)
    {
        //
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index');

    }


    public function filterPage()
    {
        //
        // Use the factory to generate manufacturers and vehicle types
        $manufacturers = CarFactory::new()->create()->pluck('manufacturer')->unique()->toArray();
        $vehicleTypes = CarFactory::new()->create()->pluck('type')->unique()->toArray();

        return view('cars.filterpage', compact('manufacturers', 'vehicleTypes'));
    }




    public function applyFilter(Request $request)
    {
        // Retrieve filter criteria from the form
        $manufacturers = $request->input('manufacturers', []);
        $type = $request->input('vehicleTypes', []);
        $minPriceRange = $request->input('minPriceRange', 0);
        $maxPriceRange = $request->input('maxPriceRange', 10000);

        // Query the cars based on the filter criteria
        $carsQuery = Car::query()
            ->when(!empty($manufacturers), function ($query) use ($manufacturers) {
                $query->whereIn('manufacturer', $manufacturers);
            })
            ->when(!empty($type), function ($query) use ($type) {
                $query->whereIn('type', $type);
            })
            ->whereBetween('price', [$minPriceRange, $maxPriceRange])
            ->orderBy('id', 'desc');


        // $cars = $carsQuery->paginate(10)->withPath(route('cars.index'));
        // Replace 'cars.index' with the actual name of your index route

        $cars = $carsQuery->paginate(10);
        // Pass the filtered cars to the 'cars.index' view

        return view('cars.index', compact('cars'));
    }




}
