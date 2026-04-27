<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    //
    public function index(){
        $revenues =[
            ['month' => 'Jan', 'amount' => 3200],
            ['month' => 'Feb', 'amount' => 3600],
            ['month' => 'Mar', 'amount' => 4200],
            ['month' => 'Apr', 'amount' => 4830],
            ['month' => 'May', 'amount' => null],
            ['month' => 'Jun', 'amount' => null],
        ];
        return view("layouts.dasboard.index", compact('revenues'));
    }
}
