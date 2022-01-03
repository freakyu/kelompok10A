<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auths.login');
    }

    public function postlogin(Request $request) {
        // Membuat beberapa aturan dalam pengisian data login
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        // Mencocokkan data yang diinput dengan data base
        if(Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function register() {

        return view('auths.register');
    }

    public function postregister(Request $request) {
        // Membuat beberapa aturan dalam pengisian data register
        $this->validate($request, [
            'name' => 'required | min:5',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
            'avatar' => 'mimes:jpg,jpeg,png'
        ]);
        // Mengambil data yang telat diinput dan mengirimkannya ke database
        $users = \App\Models\User::create($request->all());
        if($request->hasFile('avatar')) {
            // Mengambil gambar dan menyimpannya di folder tujuan dengan nama asli
            $request->file('avatar')->move('images/avatars/', $request->file('avatar')->getClientOriginalName());
            $users->avatar = $request->file('avatar')->getClientOriginalName();
            $users->save();
        }

        return redirect('/');
    }
}
