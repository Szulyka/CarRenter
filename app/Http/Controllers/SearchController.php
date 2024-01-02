<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function search()
    {
        $search = request('search');
        $search = strtoupper($search);
        if (strlen($search) === 6) {
            $search = substr($search, 0, 3) . '-' . substr($search, 3);
        }

        $vehicle = Vehicle::where('license_plate', $search)->first();
        if ($vehicle) {
            return view('list', ['vehicle' => $vehicle, 'crashes' => $vehicle->crashEvents]);
        } else {
            Session::flash('noVehicle');
            return to_route('welcome');
        }
    }
}
