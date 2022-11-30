<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function displaySignup()
    {
        return view("user.signup");
    }

    public function displayLogin()
    {
        return view('user.login');
    }
    public function displayAdmin()
    {
        return view('layout.adminlayout');
    }
    public function signup(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required | confirmed',
        ]);
        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $fileName='img_user'.'.'.$file->getClientOriginalExtension();
            $image=$request->file('picture')->storeAs('imgs/auth',$fileName,'public');
            $validated['picture']='storage/'.$image;
        }
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return redirect()->route("view.login");
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role === "Admin") {
                return redirect()->route('view.admin');
            } else {
                return redirect()->route('view.home');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
   
}