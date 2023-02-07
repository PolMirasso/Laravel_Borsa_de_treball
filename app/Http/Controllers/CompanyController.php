<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; #encriptar contrasenyes
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.form');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'ISBN.required' => 'Camp isbn es obligatori'
        ];

        $this->validate($request, $caps_validar, $mensaje_Error);

        $offers_data = request()->except('_token'); #excluir el _token

        Offer::insert($offers_data); #guardar a la db 

        return redirect('/')->with('mensaje', "S'han enviat les dades correctament, un cop aprovades seran publicades"); #redirigir i enviar msg
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    //public function show(Llibre $llibre)
    //{


    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        //
        // $llibre = Llibre::FindOrFail($id);

        //  $llibre = Llibre::where('isbn', $isbn)->firstOrFail();

        return view('llibres.edit', compact('llibre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $isbn)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Llibre  $llibre
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {


        #Llibre::destroy($isbn); #en cas de tindre la taula id
        #    Llibre::where('isbn', $isbn)->destroy();
        //     $llibre_des = Llibre::where('isbn', $isbn);

        //        $llibre_des->delete();

        #delete nomes borra un valor
        #destroy borra mes dun valor

        return redirect('llibres')->with('mensaje', 'Llibre borrat');
    }
}
