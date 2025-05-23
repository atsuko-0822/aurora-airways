<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $fields = [
            'full_name',
            'address',
            'phone_number',
            'email',
            'passport_number',
            'emergency_contact_name',
            'emergency_contact_phone',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $user->$field = $request->$field;
            }
        }

        $user->save();

        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully!');
    }
}
