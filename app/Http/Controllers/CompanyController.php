<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; #encriptar contrasenyes
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function create()
    {
        return view('company.form');
    }

    public function store(Request $request) #guardar dades
    {

        $caps_validar = [
            'company_email' => 'required|string|max:100',
            'company_type' => 'required|string|max:100',
            'company_nif' => 'required|string|max:100',
            'commercial_name' => 'required|string|max:100',
            'contact_person' => 'required|string|max:100',
            'company_phone' => 'required|string|max:100',
            'company_population' => 'required|string|max:100',
            'offer_type' => 'required|string|max:100',
            'working_day_type' => 'required|string|max:100',
            'offer_sector' => 'required|string|max:100',
            'characteristics' => 'required|string|max:100'
        ];

        $mensaje_Error = [
            'required' => 'El camp :attribute es obligatori', #en cas de algun camp falti
        ];

        $this->validate($request, $caps_validar, $mensaje_Error);

        $offers_data = request()->except('_token'); #excluir el _token

        Offer::insert($offers_data); #guardar a la db 

        return redirect('/')->with('mensaje', "S'han enviat les dades correctament, un cop aprovades seran publicades"); #redirigir i enviar msg
    }
}
