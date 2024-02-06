<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }
    public function store(Request $request)
    {
        // Validasi data form
        $validated_data = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:5|max:100',
        ]);

        // hashing field password dari user
        $validated_data['password'] = Hash::make($validated_data['password']);

        // Create using
        User::create($validated_data);

        // sisipkan flashing message
        $request->session()->flash('success', 'Registration successfully. Please Login!');

        // redirect ke page login
        return redirect('/login');
    }
}
