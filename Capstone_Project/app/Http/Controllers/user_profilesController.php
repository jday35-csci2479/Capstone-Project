<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class user_profilesController extends Controller
{
    public function show() {
        $user = auth()->user()->userProfile ?? new UserProfile();
        return view('user-profile.userProfile', compact('user'));
    }

    public function edit() {
        $user = auth()->user()->userProfile ?? new UserProfile();
        return view('user-profile.edit', compact('user'));
    }

    public function update(Request $request) {
        $data = $request->validate([
            'birthday' => 'nullable|date',
            'city' => 'nullable|string|max:255',
            'about_me' => 'nullable|string',
            'hobbies' => 'nullable|string',
            'majors' => 'nullable|string',
            'contact_information' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $profile = auth()->user()->userProfile;
        if ($profile) {
            $profile->update($data);
        } else {
            $profile = new UserProfile($data);
            $profile->user_id = auth()->id();
            $profile->save();
        }

        return redirect()->route('user-profile.userProfile')->with('success', 'Profile updated successfully.');
    }
}
