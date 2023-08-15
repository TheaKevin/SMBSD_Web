<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;

class adminController extends Controller
{
    public function addUserView()
    {
        return view('addUser');
    }

    public function addUserProcess(Request $request)
    {
        $validatedData = $request->validate([
            'loginID' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'fullName' => 'required|string|max:255',
            'role' => 'required|string',
        ]);

        $user = User::create($validatedData);

        $userDetailsData = $request->only([
            'nickname', 'gender', 'address', 'dob', 'classSMBSD', 'classSchool',
            'schoolName', 'hobby', 'hope', 'ekskul'
        ]);

        $user->userDetail()->create($userDetailsData);

        session()->flash('success', 'User added successfully.');

        return redirect()->route('addUserView');
    }
}
