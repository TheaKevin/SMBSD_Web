<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guestController extends Controller
{
    public function aboutView()
    {
        return view('about');
    }
}
