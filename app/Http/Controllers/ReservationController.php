<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view('reserve', ['vehicles' => Vehicle::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Reservation::create($request);
        Session::flash('reservationAdded');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
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
