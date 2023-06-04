<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Update the user's profile information based on the form data in the $request variable
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Add other fields as needed

        // Save the updated user record
        $user->update();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
