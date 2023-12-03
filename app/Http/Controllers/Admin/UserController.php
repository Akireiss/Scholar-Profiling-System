<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $user = auth()->user();
        return view('admin.settings.users.index', compact('user'));
    }

    public function accounts() {
        $users = User::all();
        return view('admin.settings.users.accounts', compact('users'));
    }

    public function addAccount() {
        return view('admin.settings.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:0,1',
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();

        return response()->json(['message' => 'User created successfully']);
    }

    //Profile update
    public function updateProfile(Request $request)
    {
    // Validate the request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'password' => 'nullable|string|min:6', // Password is optional
        'role' => 'required|in:0,1',
    ]);

    // Update the user profile
    $user = auth()->user(); // Assuming the user is authenticated
    $user->name = $validatedData['name'];
    $user->username = $validatedData['username'];
    if (!empty($validatedData['password'])) {
        $user->password = Hash::make($validatedData['password']);
    }
    $user->role = $validatedData['role'];
    $user->save();

    return response()->json(['message' => 'Updated successfully']);

}



}
