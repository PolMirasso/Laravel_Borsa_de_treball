<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; #encriptar contrasenyes
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;

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
            'company_type' => 'required',
            'company_nif' => 'required|string|max:100',
            'commercial_name' => 'required|string|max:100',
            'contact_person' => 'required|string|max:100',
            'company_phone' => 'required|string|max:100',
            'company_population' => 'required|string|max:100',
            'offer_type' => 'required',
            'working_day_type' => 'required',
            'offer_sector' => 'required',
            'characteristics' => 'required|string|max:100'
        ];

        $mensaje_Error = [
            'required' => 'El camp :attribute es obligatori',
            'company_email.required' => 'El correu és obligatori.',
            'company_type.required' => 'Seleciona un tipus de empresa.',
            'company_nif.required' => 'El nif és obligatori.',
            'commercial_name.required' => "El nom de l'empresa és obligatori.",
            'contact_person.required' => 'La persona de contacte és obligatori.',
            'company_phone.required' => 'El número de contacte és obligatori.',
            'company_population.required' => "La població de l'empresa és obligatòria.",
            'offer_type.required' => "Seleciona un tipus d'oferta.",
            'working_day_type.required' => "La jornada de treball és obligatòria.",
            'offer_sector.required' => 'El sector és obligatori.',
            'characteristics.required' => 'Les característiques són obligatòries.',
        ];

        $this->validate($request, $caps_validar, $mensaje_Error);

        $offers_data = request()->except('_token'); #excluir el _token

        Offer::insert($offers_data); #guardar a la db 

        $details = [
            'subject' => 'Solicitud de ' . $request->commercial_name,
            'title' => 'La empresa ' . $request->commercial_name . ' solicita publicacio en borsa de treball publica',
            'body1' => 'La empresa ' . $request->commercial_name . ', amb correu ' . $request->company_email . ' ha enviat una publicacio en la borsa de treball',
            'body2' => "",
            'body3' => "",
            'body4' => "",
            'body5' => "",
            'body6' => "",
            'body7' => "",
            'body8' => "",
            'fileName' => "",
            'fileRoute' => "",
        ];


        Mail::to(env('ADMIN_RECIVE_MAIL', ''))->send(new SendMail($details));

        return redirect('/')->with('mensaje', "S'han enviat les dades correctament, un cop aprovades seran publicades"); #redirigir i enviar msg
    }
}
