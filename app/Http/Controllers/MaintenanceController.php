<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    //
    public function index()
    {
        $maintenances = Maintenance::all();{
            return response()->json($maintenances);
        }
    }
}
