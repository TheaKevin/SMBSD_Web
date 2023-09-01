<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\Absent;
use App\Models\ChildProgress;
use App\Models\Post;
use App\Models\Present;

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

    public function absentView()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d');

        $users = User::where('role', 'member')
            ->whereDoesntHave('absent', function ($query) use ($startOfWeek, $endOfWeek) {
                $query->whereBetween('absentDate', [$startOfWeek, $endOfWeek]);
            })
            ->with('userDetail')
            ->get();

        return view('absent', compact('users'));
    }

    public function absentProcess(Request $request){
        $selectedUserIds = $request->input('selected_users', []);
        $userIds = $request->input('selected_users');
        $absentDate = Carbon::today();

        if (!empty($selectedUserIds)) {
            foreach ($userIds as $userId) {
                Absent::create([
                    'user_id' => $userId,
                    'absentDate' => $absentDate,
                ]);

                // Update points in userDetails
                $userDetail = UserDetail::where('user_id', $userId)->first();
                if ($userDetail) {
                    $userDetail->increment('point');
                }
            }
            
            session()->flash('success', 'Data absen berhasil disimpan.');

            return redirect()->route('absentView');
        }

        session()->flash('error', 'Tidak ada user yang dipilih.');

        return redirect()->route('absentView');
    }

    public function addActivityView()
    {
        return view('addActivity');
    }

    public function addActivityProcess(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('post_images', 'public');

        $post = new Post([
            'postImage' => $imagePath,
            'postDesc' => $request->input('caption'),
        ]);

        $post->save();

        session()->flash('success', 'Data absen berhasil disimpan.');

        return redirect()->route('addActivityView');
    }

    public function addPointExchangeItemView()
    {
        return view('addPointExchange');
    }

    public function addPointExchangeItemProcess(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'point' => 'required|integer|min:1',
        ]);

        $imagePath = $request->file('image')->store('point_exchange_images', 'public');

        $pointExchange = new Present([
            'presentImage' => $imagePath,
            'presentName' => $request->input('name'),
            'presentPoints' => $request->input('point'),
        ]);

        $pointExchange->save();

        session()->flash('success', 'Data absen berhasil disimpan.');

        return redirect()->route('addPointExchangeItemView');
    }
}
