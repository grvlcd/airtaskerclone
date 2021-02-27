<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        $user = User::with(['portfolio', 'profile'])->where('id', '=', Auth::user()->id)->get()->first();
        return view('profiles.index')
            ->with(['user' => $user]);
    }

    public function edit(User $user) {
        $user->profile;
        return view('profiles.edit')->with([
            'user' => $user,
        ]);
    }

    public function update(ProfileRequest $request) {
        $user = $request->user();
        $user->fill($request->validated());

        if($request->hasFile('image')) {
            if($user->profile != null) {
                Storage::disk('images')->delete($user->profile->path);
                $user->profile->delete();
            }
            $user->profile()->create([
                'age' => $request->age,
                'birthday' => $request->birthday,
                'path' => $request->image->store('users', 'images'),
            ]);
        }
        $user->save();
        return redirect()->route('profile.index')->withSuccess('Profile updated!');
    }
}
