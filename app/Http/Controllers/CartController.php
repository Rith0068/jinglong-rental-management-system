<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('layouts.building-cart.index', compact('properties'));
    }
    public function store(Request $request){

        $name = $request->name;
        $address = $request->address;
        $price = $request->price;
        $description = $request->description;
        $pichture = $request->pichture;

    Property::create(
        [ 
        'name' => $name,
        'address' => $address,
        'price' => $price,
        'description' => $description,
        'pichture' => $pichture,
        ]
    );
        

        return redirect()->back();
    }
    public function show($id)
    {
        $property = Property::with('images')->findOrFail($id);
        return view('layouts.building.show', compact('property'));
    }
}
