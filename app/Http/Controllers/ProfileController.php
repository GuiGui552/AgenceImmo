<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($this->extractData($request));

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    private function extractData(ProfileUpdateRequest $request)  {
        $data = $request->validated();
        $avatar = $request->validated('avatar');

        if ($avatar == null || $avatar->getError()) {
            return $data;
        }

        if (Auth::user()->avatar) {
            Storage::disk('public')->delete(Auth::user()->avatar);
        }
        $data['avatar'] = $avatar->store('user/avatarUser'.Auth::user()->id, 'public');
        return $data;
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
       
        if (Auth::user()->avatar != 'user-image-default/user-icon.png') {
            $avatarPath = Auth::user()->avatar;

            if (Storage::disk('public')->exists($avatarPath)) {
                Storage::disk('public')->delete($avatarPath);

                // Obtenez le chemin du dossier contenant l'image
                $folderPath = dirname($avatarPath);

                // Vérifiez si le dossier est vide
                if (count(Storage::disk('public')->files($folderPath)) === 0) {
                    // Supprimez le dossier
                    Storage::disk('public')->deleteDirectory($folderPath);
                }
            }
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
