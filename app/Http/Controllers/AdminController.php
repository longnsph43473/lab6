<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function toggleUserActive($id)
    {
        $user = User::findOrFail($id);
        $user->active = !$user->active;
        $user->save();

        return back();
    }
}

