<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class GuestController extends Controller
{
    public function aboutView()
    {
        return view('about');
    }

    public function donationView()
    {
        return view('donation');
    }

    public function home()
    {
        $post = Post::latest()->first(); // Retrieve the newest post

        return view('welcome',compact ('post'));
    }
}
