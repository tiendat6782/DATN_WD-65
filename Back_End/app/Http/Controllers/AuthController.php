<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        if ($request->password == $request->repassword) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('showLoginForm')->with(['msg' => "Register Success"]);
        } else {
            // Handle the case where passwords do not match
            return redirect()->route('showRegisterForm')->with(['msg' => 'Passwords do not match']);
        }
    }


    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {

        $user = $request->only('email', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('home')->with(['msg' => "Wellcome"]);
        } else
            return redirect()->back()->with(['msg' => "Account is incorrect"]);
    }
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('home')->with(['msg' => "Logout Success"]);
    }


    public function showProfile()
    {
        // $user = User::find(Auth::user()->id);
        return view('Auth.profile');
    }
    public function updateProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Update the user's profile information
        $user = User::find($userId);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('showProfile')->with(['msg' => 'Profile updated successfully.']);
    }
}
