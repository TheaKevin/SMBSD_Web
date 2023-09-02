<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Present;

class userController extends Controller
{
    public function viewProfile($id)
    {
        $user = User::with(['userDetail'])->findOrFail($id);
        
        $childProgress = $user->childProgress()->orderBy('created_at', 'desc')->paginate(10);

        return view('viewProfile', compact('user', 'childProgress'));
    }

    public function pointExchangeView(Request $request)
    {
        $itemsPerPage = $request->query('items', 30); // Default to 30 items per page

        $presents = Present::paginate($itemsPerPage);

        return view('pointExchange', compact('presents'));
    }
}
