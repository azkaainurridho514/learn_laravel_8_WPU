<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
    //    jika validate semuanya berhasil maka akan menjalankan script di bawahnya
        $validatedData = $request->validate([
                        'name' => 'required|max:255',
                        'username' => 'required|min:5|max:255',
                        'email' => 'required|email:dns|unique:users',
                        'password' => 'required|min:8'
                    ]);
        // memakai bcrypt
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration succesfully!!!');
        return redirect('/login')->with('success', 'Registration succesfully!!!');
    }
}
