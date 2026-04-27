<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class RentController extends Controller
{
    //
    public function index(){
        $title = 'Do the project';
        $users = 'Is me ';
        $name = 'chork bora';
        $age = 20;
        $rith = Property::all();
        dd($rith);

        dd($name, $title, $users);
        return view('layouts.rent.index', compact('name', 'age', 'title', 'users'));
    }
}
