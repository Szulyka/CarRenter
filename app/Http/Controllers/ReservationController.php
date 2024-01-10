<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function reserve(Request $v)
    {
        $veh = Vehicle::find($v->id);
        $vS = $v->start_date;
        $vE = $v->end_date;
        $delta = Carbon::parse($vS)->diffInDays(Carbon::parse($vE));
        return view('reserve', [
            'vehicle' => $veh,
            'start_date' => $vS,
            'end_date' => $vE,
            'days_sum' => $delta,
            'price_sum' => $veh->pricePerDay*$delta
            ]);
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
                'phone_number' => 'required|numeric',
                'vehicle_id' => 'required',
                'reservation_start' => 'required|date',
                'reservation_end' => 'required|date',
            ],
        );
        $daysSum = Carbon::parse($request->reservation_end)->diffInDays(Carbon::parse($request->reservation_start));
        $validated['days_reserved'] = $daysSum;
        $vehicle = Vehicle::find($request->vehicle_id);
        $validated['price'] = $daysSum * $vehicle->pricePerDay;
        Reservation::create($validated);
        Session::flash('reservation_added');
        return redirect()->route('welcome');
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
