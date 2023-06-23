<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'title' => 'Home'
        ]);
    }

    public function login()
    {
        return Inertia::render('Login', [
            'title' => 'Авторизация'
        ]);
    }

    public function loginAuth(Request $request)
    {
        if(auth()->attempt($request->validate([
            'email' => ['required', 'string', 'email', 'exists:users'],
            'password' => ['required', 'string']
        ]))) {
            session()->flash('message', 'Успешная авторизация');
            return redirect()->route('users.index');
        }
        return redirect()->back()->withErrors(['email' => 'Неверный email или пароль']);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');

    }
}
