<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();

        if ($request->hasFile('photo')) {

            // hapus foto lama (jika ada)
            if ($user->photo && file_exists(public_path('images/profile/'.$user->photo))) {
                unlink(public_path('images/profile/'.$user->photo));
            }

            $file = $request->file('photo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/profile'), $filename);

            $user->photo = $filename;
            $user->save();
        }

        return back()->with('success_photo', 'Foto berhasil diperbarui ✨');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error_password', 'Password lama salah!');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success_password', 'Password berhasil diganti 🔐');
    }
}
