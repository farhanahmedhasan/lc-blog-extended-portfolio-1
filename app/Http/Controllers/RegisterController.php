<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store (Request $request)
    {
        $attributes = $request->validate([
            "name" => 'required | min:3 | max:255',
            "username" => 'required | min:3 | max:255 | unique:users,username',
            "email" => 'required | email | unique:users,email',
            "password" => 'required | min:4 | max:255'
        ]);

        //Password hashing is running through a mutator in it's model name setPasswordAttribute -> following convention
        $user = User::create($attributes);

        //log the user in
        Auth::login($user);

        return redirect('/')->with('success', 'Your account has been created');

    }
}
