<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listCars');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addVehicle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'license_plate' => 'required|unique:vehicles|regex:/^[A-Za-z]{3}-?\d{3}$/',
                'brand' => 'required',
                'type' => 'required',
                'year' => 'required|numeric',
                'pricePerDay' => 'required|numeric',
                'image_file_name' => 'image',
            ],
            [
                'license_plate.required' => 'A rendszám megadása kötelező!',
            ]

        );
        $validated['license_plate'] = strtoupper($validated['license_plate']);
        if (strlen($validated['license_plate']) === 6) {
            $validated['license_plate'] = substr($validated['license_plate'], 0, 3) . '-' . substr($validated['license_plate'], 3);
        }
        if ($request->hasFile('image_file_name')) {
            $file = $request->file('image_file_name');
            $fname = $file->hashName();
            Storage::disk('public')->put('images/' . $fname, $file->get());
            $validated['image_file_name'] = $fname;
        }

        $validated['is_active'] = true;
        Vehicle::create($validated);
        Session::flash('vehicle_added');
        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        return view('editVehicle', ['vehicle' => $vehicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'brand' => 'required',
            'type' => 'required',
            'year' => 'required|numeric',
        ]);

        if ($request->hasFile('image_file_name')) {
            Storage::disk('public')->delete('images/' . $vehicle->image_file_name);
            $file = $request->file('image_file_name');
            $fname = $file->hashName();
            Storage::disk('public')->put('images/' . $fname, $file->get());
            $validated['image_file_name'] = $fname;
        }


        $vehicle->update($validated);
        $isActive = $request->filled('isActive');
        $vehicle->update([
            'is_active' => $isActive,
        ]);
        if(!$isActive) {
            $vehicle->reservations()->delete();
        }
        Session::flash('vehicle_edited');
        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
