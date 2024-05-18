<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user=auth()->user();
        $user->update([
                      'name'=>$request->name,
                      'email'=>$request->email
        ]);

        if($request->filled('password')){
            $user->update([
                          'password'=>bcrypt($request->password)
            ]);
        }
      

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
