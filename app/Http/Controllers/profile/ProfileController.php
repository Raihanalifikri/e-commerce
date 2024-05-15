<?php

namespace App\Http\Controllers\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function changePassword()
    {
        return view('profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
         //validate
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:3',
            'confirm_password' => 'required|min:3'
        ]);
        //check current status
        $currentPasswordStatus = Hash::check(
            $request->current_password,
            auth()->user()->password
        );
        if ($currentPasswordStatus) {
            if ($request->password == $request->confirm_password) {
                // Mendapatkan pengguna yang sedang login
                $user = auth()->user();
                // Memperbarui kata sandi
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success', 'password changed successfully! 😋');
            } else {
                return redirect()->back()->with('error', 'Password does not match! 😭');
            }
        } else {
            return redirect()->back()->with('error', 'Current password is incorrect! 😠');
        }       
    }
}
