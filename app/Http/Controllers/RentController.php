<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentController extends Controller
{
    //
    public function index(){
        $title = 'Do the project';
        $users = 'Is me ';
        $name = 'chork bora';
        $age = 20;

        dd($name, $title, $users);
        return view('layouts.rent.index', compact('name', 'age', 'title', 'users'));
    }
}
