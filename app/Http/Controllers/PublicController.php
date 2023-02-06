<?php

namespace App\Http\Controllers;

use App\Models\offers;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; #encriptar contrasenyes
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{

    public function create()
    {

        return view('public.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        $remember = ($request->has('remember') ? true : false);

        $user = Auth::AdminUser();

        if (Auth::attempt($credentials, $remember)) {
            //login correct

            $request->session()->regenerate();

            return redirect()->intended('/llibres');


            # return redirect()->view('/index');
        } else {
            //msg error
            return redirect('login');
        }
    }
}
