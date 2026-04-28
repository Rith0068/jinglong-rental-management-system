<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaymentController extends Controller
{
    //
    public function index(){
        return view('layouts.payment.index');
    }
}
