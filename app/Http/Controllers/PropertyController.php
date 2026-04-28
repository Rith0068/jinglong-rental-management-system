<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function index()
    {
        $properties = Property::paginate();
        return view('layouts.property.index',compact('properties'));
    }

    public function store(Request $request){

        $name = $request->name;
        $address = $request->address;
        $price = $request->price;
        $description = $request->description;

    Property::create(
        [ 
        'name' => $name,
        'address' => $address,
        'price' => $price,
        'description' => $description,
        ]
    );

        return redirect()->back();
    }
}
