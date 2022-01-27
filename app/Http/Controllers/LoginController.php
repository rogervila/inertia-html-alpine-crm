<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('get')) {
            return Inertia::render('Auth/Login');
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user);
        }

        return redirect('/');
    }
}
