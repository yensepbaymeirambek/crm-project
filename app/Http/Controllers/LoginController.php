<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function signin(Request $request)
    {

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withInput()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signup(Request $request)
    {
        // validate
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validated) {
            return back()
                ->withErrors($validated)
                ->withInput(Input::except('password'));
        } else {
            $user = User::create(request(['username', 'email', 'password']));

            auth()->login($user);

            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function local(Request $request) {
        if (!in_array($request->local, ['en', 'ru'])) {
            abort(400);
        }
        App::setLocale($request->local);
        return redirect()->route('settings', app()->getLocale());
    }
}
