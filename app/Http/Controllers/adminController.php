<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\ChildProgress;

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
            'role' => 'required|string'
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

    public function addParentView()
    {
        $members = User::where('role', 'member')
            ->whereNull('parent_id')
            ->get();

        $parents = User::where('role', 'parent')->get();

        return view('addParent', compact('members', 'parents'));
    }

    public function addParentProcess(Request $request)
    {
        User::where('id', $request->child)->update(['parent_id' => $request->parent]);

        session()->flash('success', 'Orang tua berhasil ditambahkan.');

        return redirect()->route('addParentView');
    }

    public function updateProgressView()
    {
        $currentMonth = Carbon::now()->format('Y-m');

        $members = User::where('role', 'member')
        ->whereDoesntHave('childProgress', function ($query) use ($currentMonth) {
            $query->where('created_at', 'LIKE', $currentMonth.'%');
        })
        ->get();

        return view('updateProgress', compact('members'));
    }

    public function updateProgressProcess(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|string|max:255',
            'childProgressSummary' => 'required|string|max:255',
            'childProgressLearned' => 'required|string|max:255'
        ]);

        ChildProgress::create($validatedData);

        session()->flash('success', 'Progress siswa berhasil disimpan.');

        return redirect()->route('updateProgressView');
    }
}
