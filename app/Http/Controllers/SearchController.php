<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function validateSearch($search)
    {
        $search = strtoupper($search);
        if (strlen($search) === 6) {
            $search = substr($search, 0, 3) . '-' . substr($search, 3);
        }
        return $vehicle = Vehicle::where('license_plate', $search)->first();
    }
    public function search()
    {
        $search = request('search');
        $vehicle = $this->validateSearch($search);
        if ($vehicle) {
            return view('list', ['vehicle' => $vehicle, 'crashes' => $vehicle->crashEvents]);
        } else {
            Session::flash('noVehicle');
            return to_route('welcome');
        }
    }

    public function adminSearch()
    {
        $search = request('adminSearch');
        $vehicle = $this->validateSearch($search);
        if ($vehicle) {                         //'crashes' => $vehicle->crashEvents
            return view('editVehicle', ['vehicle' => $vehicle]);
        } else {
            Session::flash('noVehicle');
            return to_route('admin');
        }
    }

    public function dateSearch(Request $request)
    {
        $datePattern = "/^\d{2}\/\d{2}\/\d{4} - \d{2}\/\d{2}\/\d{4}$/";
        $dates = $request->input('dates');
        $dateRange = explode(' - ', $dates);
        $startDate = date('Y-m-d', strtotime($dateRange[0]));
        $endDate = date('Y-m-d', strtotime($dateRange[1]));
        //elerheto járművek idjai az adott időben
        $avV = DB::select('select id from vehicles where id not in (select vehicle_id from reservations where not
        (reservation_end < ? or reservation_start > ?))', [$startDate, $endDate]);
        //dd($avV);
        $availableVehicles = Vehicle::whereIn('id', collect($avV)->pluck('id'))->get();
        if (count($availableVehicles) != 0) {
            return view('listAll', ['vehicles' => $availableVehicles]);
        } else {
            Session::flash('noVehicle');
            return to_route('welcome');
        }
    }
}
