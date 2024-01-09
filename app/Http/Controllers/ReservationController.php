<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function reserve(Vehicle $v)
    {
        return view('reserve', ['vehicle' => Vehicle::where($v->license_plate)]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('listReservations', ['reservations' => Reservation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Vehicle $vehicle)
    {
        return view('reserve', ['vehicle' => $vehicle]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
            ],
        );
        Reservation::create($validated);
        Session::flash('reservation_added');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
