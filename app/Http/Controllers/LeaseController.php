<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lease;

class LeaseController extends Controller
{
    //
    public function index()
    {
        $leases = Lease::all();{
            return response()->json($leases);
        }
    }
}
