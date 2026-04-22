<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function index()
    {
        return view('layouts.property.index',);
    }
    public function store(Request $request){

    Property::create(
        [ 
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'price' => $request->input('price'),
        'description' => $request->input('description'),
        ]
    );
        
        $name = $request->name;
        $address = $request->address;
        $price = $request->price;
        $description = $request->description;

        return view('layouts.property.index', compact('name', 'address', 'price', 'description'));
    }
}
