<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AeroController extends Controller
{
    public function show_dash()
    {   
        $user = Auth::user();
        //    dd($user->userID);
        //    dd($user);
      // $user = session('user');
        if ($user) {
            // User is authenticated
            $peoples = People::where('officer_id', $user->userID)->get();

            return view('aero_dashboard', ['user' => $user, 'peoples' => $peoples]);
    
        } else {
            // User is not authenticated, handle accordingly (redirect to login, show an error, etc.)
            return redirect('Login');
        }
    }
}
