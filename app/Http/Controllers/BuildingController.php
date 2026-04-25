<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\ImgBuilding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    public function index()
    {
        $properties = Property::with('images')->get();
        return view('layouts.building.index', compact('properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'               => 'required|string',
            'address'            => 'required|string',
            'price'              => 'required|numeric',
            'description'        => 'nullable|string',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'number_of_building' => 'nullable|integer',
        ]);

        $property = Property::create([
            'name'        => $request->name,
            'address'     => $request->address,
            'price'       => $request->price,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('buildings', 'public');

            ImgBuilding::create([
                'property_id'        => $property->id,
                'image'              => $imagePath,
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

    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        foreach ($property->images as $img) {
            Storage::disk('public')->delete($img->image);
        }

        $property->delete();
        return redirect()->route('building.index')->with('success', 'Building deleted!');
    }
}