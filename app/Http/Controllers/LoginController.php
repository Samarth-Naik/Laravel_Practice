<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   
    public function __construct()
{
    $this->middleware('web');
}
     public function showform(){
        return View('login');
     }
     public function check(Request $request)
     {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
           // dd($user, session()->all());
            // Redirect to the intended URL or a default if not provided
            switch ($user->role) {
                case 'AERO':
                    return redirect('/aero_dashboard');
                case 'RO':
                    return redirect('/ro_dashboard');
                // Add more cases for other roles if needed
                default:
                    return redirect('/blo_dashboard');
            }
        }
        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
     }

     public function logout()
     {
        Auth::logout();
        return redirect('/Login');
     }
}
