<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Store the user's ID in the session
            $request->session()->put('authid', $user->id);
    
            // Verify that the session data is stored correctly
            // dd($request->session()->all()); // This will dump all session data to confirm
    
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
    
            return redirect()->route('user.index');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
