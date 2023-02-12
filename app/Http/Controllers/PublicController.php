<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; #encriptar contrasenyes
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Offer;

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
                return redirect()->intended('/admin');
            }

            //   return redirect()->intended('/student.index');


        } else {
            //msg error
            return redirect('login');
        }
    }

    public function viewBorsa()
    {
        $datos = Offer::where('offer_visiblity', "1")->get();
        $id = $datos->sortBy('offer_id')->pluck('offer_id')->unique();
        $company_type =  $datos->sortBy('company_type')->pluck('company_type')->unique();
        $company_population =  $datos->sortBy('company_population')->pluck('company_population')->unique();
        $offer_type =  $datos->sortBy('offer_type')->pluck('offer_type')->unique();
        $working_day_type =  $datos->sortBy('working_day_type')->pluck('working_day_type')->unique();
        $offer_sector =  $datos->sortBy('offer_sector')->pluck('offer_sector')->unique();
        $characteristics =  $datos->sortBy('characteristics')->pluck('characteristics')->unique();

        return view('public.table', compact('id', 'company_type', 'company_population', 'offer_type', 'working_day_type', 'offer_sector', 'characteristics'));
    }

    public function getData()
    {
        $data = Offer::where('offer_visiblity', "1")->select(
            'offer_id as id',
            'company_type',
            'company_population',
            'offer_type',
            'working_day_type',
            'offer_sector',
            'characteristics'
        )->get();

        return compact('data');
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
