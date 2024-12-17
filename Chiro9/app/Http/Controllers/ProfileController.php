<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show public profile page for a user
    public function show()
    {
        // Fetch the user details
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Show the edit profile form (accessible only by logged-in users)
    public function edit()
    {
        // Fetch the current authenticated user
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update the profile data
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
            'username' => 'nullable|string|max:255|unique:users,username,' . auth()->id(),
            'birthday' => 'nullable|date',
            'about_me' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = auth()->user();
    
        // Algemene gegevens bijwerken
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->birthday = $request->input('birthday');
        $user->about_me = $request->input('about_me');
    
        // Wachtwoord bijwerken indien ingevuld
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        // Profielfoto bijwerken
        if ($request->hasFile('profile_picture')) {
            // Oude foto verwijderen indien aanwezig
            if ($user->profile_picture) {
                Storage::delete('public/' . $user->profile_picture);
            }
    
            // Nieuwe foto opslaan
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }
    
        $user->save();
    
        return redirect()->route('profile.show', $user)->with('success', 'Profiel succesvol bijgewerkt!');
    }
}