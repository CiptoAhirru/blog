<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user_google = Socialite::driver('google')->user();

            // dd($user_google);
            $user = User::where('email', $user_google->getEmail())->first();

            if ($user != null) {
                auth()->login($user, true);
                return redirect()->intended('/dashboard');
            } else {
                $data = User::create([
                    'email' => $user_google->getEmail(),
                    'name' => $user_google->getName(),
                    'avatar' => $user_google->getAvatar(),
                    'email_verified_at' => date(now()),
                    // 'password' => 0,
                ]);

                auth()->login($data, true);
                return redirect()->intended('/dashboard');
            }
        } catch (Exception $e) {
            return redirect('home')->with('loginError', 'Login failed');;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect('/home');
    }
}
