<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display users list
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    /**
     * Change role
     */
    public function changeRole(User $user)
    {
        if($user->role == 'admin') {

            $user->update([
                'role' => 'user'
            ]);

        } else {

            $user->update([
                'role' => 'admin'
            ]);
        }

        return redirect()->back()
            ->with('success', 'User role updated');
    }

    /**
     * Delete user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()
            ->with('success', 'User deleted');
    }
}