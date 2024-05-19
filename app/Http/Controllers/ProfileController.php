<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $user = $request->user();
    //     $user->fill($request->validated());


    //     if ($user->isDirty('email')) {
    //         $user->email_verified_at = null;
    //     }

    //     // Log the last name for debugging purposes
    //     if ($request->has('last_name')) {
    //         $user->last_name = $request->input('last_name');
    //         Log::info("Last name updated to: " . $request->last_name);
    //     } else {
    //         Log::info("Last name not provided in the request.");
    //     }

    //     if ($request->has('sex')) {
    //         $user->sex = $request->input('sex');
    //         Log::info("Last name updated to: " . $request->sex);
    //     } else {
    //         Log::info("Last name not provided in the request.");
    //     }

    //     $user->save();
    //     return Redirect::route('profile.edit');
    // }




    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle the profile picture upload
        if ($request->hasFile('profile_pic')) {
            // Delete the old profile picture if it exists
            if ($user->profile_pic && Storage::disk('public')->exists($user->profile_pic)) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $profilePicName = 'profile_pic_' . $user->id . '.' . $request->file('profile_pic')->getClientOriginalExtension();
            $profilePicPath = $request->file('profile_pic')->storeAs('profile_pics', $profilePicName, 'public');
            $user->profile_pic = $profilePicPath;
        }

        // Handle the profile banner upload
        if ($request->hasFile('profile_banner')) {
            // Delete the old profile banner if it exists
            if ($user->profile_banner && Storage::disk('public')->exists($user->profile_banner)) {
                Storage::disk('public')->delete($user->profile_banner);
            }

            $profileBannerName = 'profile_banner_' . $user->id . '.' . $request->file('profile_banner')->getClientOriginalExtension();
            $profileBannerPath = $request->file('profile_banner')->storeAs('profile_banners', $profileBannerName, 'public');
            $user->profile_banner = $profileBannerPath;
        }

        // Log the last name for debugging purposes
        if ($request->has('last_name')) {
            $user->last_name = $request->input('last_name');
            Log::info("Last name updated to: " . $request->last_name);
        } else {
            Log::info("Last name not provided in the request.");
        }

        if ($request->has('sex')) {
            $user->sex = $request->input('sex');
            Log::info("Sex updated to: " . $request->sex);
        } else {
            Log::info("Sex not provided in the request.");
        }

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Profile updated successfully.');
    }








    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }

    public function destroy(Request $request): RedirectResponse
{
    $request->validateWithBag('userDeletion', [
        'password' => ['required', 'current_password'],
    ]);

    $user = $request->user();

    // Delete profile pictures from storage
    if ($user->profile_pic && Storage::disk('public')->exists($user->profile_pic)) {
        Storage::disk('public')->delete($user->profile_pic);
    }

    if ($user->profile_banner && Storage::disk('public')->exists($user->profile_banner)) {
        Storage::disk('public')->delete($user->profile_banner);
    }

    Auth::logout();

    $user->delete();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::to('/');
}

}
