<?php

namespace App\Http\Controllers;

use App\Models\offers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; #encriptar contrasenyes
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{

    public function create()
    {
        return view('public.login');
    }

    public function register(Request $request)
    {
        //validar dades '' or '' etc...


        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); //encriptar contra
        $user->course = $request->course;
        $user->population = $request->population;

        $user->mobility = ($request->mobility ? true : false);

        $uniqueFileName = (uniqid() . '-' . $request->username . '.pdf');


        //        'cv_name' => 'required|mime:pdf|max:10000',

        if ($request->hasFile('cv_file')) {
            $user->cv_name = $request->file('cv_file')->storeAs('uploads', $uniqueFileName, 'public');
        }
        $user->type_user = 0;

        $user->save();


        Auth::login($user); //guardar usuari a db


        //guardar cv

        //  return redirect(route('student.index'));
        return redirect('student.index');
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        $remember = ($request->has('remember') ? true : false);

        if (Auth::attempt($credentials, $remember)) {
            //login correct

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->type_user == 0) {
                return redirect()->intended('/student');
            } else if ($user->type_user == 1) {
                return redirect()->intended('/student');
            }

            //   return redirect()->intended('/student.index');


        } else {
            //msg error
            return redirect('login');
        }
    }


    public function logout(Request $request)
    {
        $user = Auth::user();
        Auth::logout(); //verificar funcionament sense id
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
