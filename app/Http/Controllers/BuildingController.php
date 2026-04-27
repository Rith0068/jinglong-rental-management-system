<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\ImgBuilding;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('layouts.building.index', compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'               => 'required|string',
            'address'            => 'required|string',
            'price'              => 'required|string',
            'description'        => 'nullable|string',
            'image'              => 'nullable|url',
            'number_of_building' => 'nullable|integer',
        ]);

        $property = Property::create([
            'name'        => $request->name,
            'address'     => $request->address,
            'price'       => $request->price,
            'description' => $request->description,
        ]);

        if ($request->filled('image')) {
            ImgBuilding::create([
                'property_id'        => $property->id,
                'image'              => $request->image,
                'number_of_building' => $request->number_of_building,
            ]);
        }

        return redirect()->route('building.index')->with('success', 'Building added!');
    }

    public function show($id)
    {
        $property = Property::with('images')->findOrFail($id);
        return view('layouts.building.show', compact('property'));
    }

    // ✅ THIS WAS MISSING — add this method
    public function edit($id)
    {
        $property = Property::with('images')->findOrFail($id);
        return view('layouts.building.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $request->validate([
            'name'               => 'required|string',
            'address'            => 'required|string',
            'price'              => 'required|string',
            'description'        => 'nullable|string',
            'image'              => 'nullable|url',
            'number_of_building' => 'nullable|integer',
        ]);

        $property->update([
            'name'        => $request->name,
            'address'     => $request->address,
            'price'       => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('building.index')->with('success', 'Building updated!');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->images()->delete();
        $property->delete();
        return redirect()->route('building.index')->with('success', 'Building deleted!');
    }
}