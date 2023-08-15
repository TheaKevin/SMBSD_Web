<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;

class superAdminController extends Controller
{

    public function addAdminView()
    {
        $users = User::with('userDetail')
        ->where('role', 'member')
        ->get();

        return view('addAdmin', compact('users'));
    }

    public function addAdminProcess(Request $request)
    {
        $selectedUserIds = $request->input('selected_users', []);

        if (!empty($selectedUserIds)) {
            User::whereIn('id', $selectedUserIds)->update(['role' => 'admin']);

            session()->flash('success', 'Semua user terpilih berhasil dijadikan sebagai admin.');

            return redirect()->route('addAdminView');
        }

        session()->flash('error', 'Tidak ada user yang dipilih.');

        return redirect()->route('addAdminView');
    }

    public function deleteAdminView()
    {
        $users = User::with('userDetail')
        ->where('role', 'admin')
        ->get();

        return view('deleteAdmin', compact('users'));
    }

    public function deleteAdminProcess(Request $request)
    {
        $selectedUserIds = $request->input('selected_users', []);

        if (!empty($selectedUserIds)) {
            User::whereIn('id', $selectedUserIds)->update(['role' => 'member']);

            session()->flash('success', 'Semua user terpilih berhasil dijadikan sebagai member.');

            return redirect()->route('deleteAdminView');
        }

        session()->flash('error', 'Tidak ada user yang dipilih.');

        return redirect()->route('deleteAdminView');
    }

}
