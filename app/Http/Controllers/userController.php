<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;

class userController extends Controller
{
    public function viewProfile($id)
    {
        $user = User::with(['userDetail'])->findOrFail($id);
        
        $childProgress = $user->childProgress()->paginate(10);

        return view('viewProfile', compact('user', 'childProgress'));
    }
}
