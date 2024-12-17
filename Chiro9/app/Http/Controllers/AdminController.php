<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    // Toon lijst van gebruikers
    public function showUsers()
    {
        $users = User::all(); // Haal alle gebruikers op
        return view('admin.dashboard', compact('users'));
    }

    public function createUser(Request $request)
    {
        
        // Valideer de inkomende gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Voeg een confirmatieveld voor wachtwoord toe
        ]);

        // Maak de nieuwe gebruiker
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->isAdmin = $request->has('isAdmin') ? true : false; // Is Admin?
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Nieuwe gebruiker succesvol aangemaakt!');
    
    }

    // Maak een gebruiker admin
    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);

        // Check of de huidige gebruiker een admin is
        if (auth()->user()->isAdmin) {
            $user->isAdmin = true;
            $user->save();
            return redirect()->back()->with('success', 'Gebruiker is nu een admin.');
        }

        return redirect()->back()->with('error', 'Je hebt geen rechten om dit te doen.');
    }

    // Admin-rechten afnemen
    public function removeAdmin($id)
    {
        $user = User::findOrFail($id);

        // Check of de huidige gebruiker een admin is
        if (auth()->user()->isAdmin) {
            $user->isAdmin = false;
            $user->save();
            return redirect()->back()->with('success', 'Admin-rechten zijn verwijderd.');
        }

        return redirect()->back()->with('error', 'Je hebt geen rechten om dit te doen.');
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Ensure that the current user is an admin
        if (auth()->user()->isAdmin) {
            // Check if the admin is trying to delete themselves
            if ($user->id === auth()->user()->id) {
                return redirect()->back()->with('error', 'You cannot delete your own account.');
            }

            // Delete the user
            $user->delete();

            // Log the action
            Log::info('Admin deleted a user:', ['admin' => auth()->user()->name, 'deleted_user' => $user->name]);

            return redirect()->route('admin.dashboard')->with('success', 'Gebruiker succesvol verwijderd!');
        }

        return redirect()->back()->with('error', 'Je hebt geen rechten om dit te doen.');
    }
}
