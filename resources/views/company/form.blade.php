<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Formulari Borsa Treball</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}">
</head>


<div class="container">

    @if(count($errors)>0)

    <div class=" alert alert-danger">
        <ul>
            @foreach( $errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif

    <div class="card mb-4 py-3 border-left-primary" style="margin-top: 2%;">

        <div class=" card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulari Empreses</h6>
        </div>
        <div class="card-body">

            <p> <strong>Us comuniquem a les ETT's i Empreses de Selecció, que per tal de no solapar ofertes necessitarem
                    que ens
                    indiqueu les dades de l'empresa per la qual oferteu (aquestes dades seran tractades de forma
                    confidencial i en cap cas La Salle Mollerussa les utilitzarà per gestionar l'oferta, sols per tal de
                    no
                    duplicar ofertes que fan les pròpies empreses en diferents llocs).</strong></p>

            <form action="{{ url('/company') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="company_email" class="form-label">Adreça electrònica: </label>
                    <input type="email" class="form-control" name="company_email"
                        value="{{ isset($offer->company_email)?$offer->company_email:old('company_email') }}"
                        id="company_email">
                </div>
                <div class="mb-3">
                    <label for="contact_person">Persona de contacte: </label>
                    <input type="text" class="form-control" name="contact_person"
                        value="{{ isset($offer->contact_person)?$offer->contact_person:old('contact_person') }}"
                        id="contact_person">
                </div>

                {{-- Tipus d'Empresa --}}

                <div class="mb-3">
                    <label for="company_type">Tipus d'Empresa: </label>
                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="company_type" id="company_type"
                            value="Empresa de Treball Temporal" {{ (isset($offer->company_type) &&
                        $offer->company_type == 'Empresa de Treball Temporal') || old('company_type') ==
                        'Empresa de Treball Temporal' ? 'checked' : '' }}>
                        <label class="form-check-label" for="company_type">Empresa de Treball Temporal</label>

                    </div>
                    <div class="form-check">

                        <input class="form-check-input" type="radio" name="company_type" id="company_type"
                            value="Empresa de Selecció de Personal" {{ (isset($offer->company_type) &&
                        $offer->company_type == 'Empresa de Selecció de Personal') || old('company_type') ==
                        'Empresa de Selecció de Personal' ? 'checked' : '' }}>
                        <label class="form-check-label" for="company_type">Empresa de Selecció de Personal</label>

                    </div>
                    <div class="form-check">


                        <input class="form-check-input" type="radio" name="company_type" id="company_type"
                            value="Altres" {{ (isset($offer->company_type) &&
                        $offer->company_type == 'Altres') || old('company_type') ==
                        'Altres' ? 'checked' : '' }}>
                        <label class="form-check-label" for="company_type">Altres</label>



                    </div>

                    {{-- NIF --}}

                    <div class="mb-3">
                        </li><label for="company_nif">NIF: </label>
                        <input type="text" class="form-control" name="company_nif"
                            value="{{ isset($offer->company_nif)?$offer->company_nif:old('company_nif') }}"
                            id="company_nif">
                    </div>


                    {{-- Nom Comercial --}}


                    <div class="mb-3">
                        <label for="commercial_name">Nom Comercial: </label>
                        <input type="text" class="form-control" name="commercial_name"
                            value="{{ isset($offer->commercial_name)?$offer->commercial_name:old('commercial_name') }}"
                            id="commercial_name">
                    </div>


                    {{-- Telefon --}}

                    <div class="mb-3">
                        <label for="company_phone">Telefon: </label>
                        <input type="text" class="form-control" name="company_phone"
                            value="{{ isset($offer->company_phone)?$offer->company_phone:old('company_phone') }}"
                            id="company_phone">
                    </div>

                    {{-- Poblacio --}}


                    <div class="mb-3">
                        <label for="company_population">Poblacio: </label>
                        <input type="text" class="form-control" name="company_population"
                            value="{{ isset($offer->company_population)?$offer->company_population:old('company_population') }}"
                            id="company_population">
                    </div>

                    {{-- Tipus d'oferta --}}

                    <div class="mb-3">
                        <label for="offer_type">Tipus d'oferta: </label>

                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="offer_type" id="offer_type"
                                value="Pràctiques" {{ (isset($offer->offer_type) &&
                            $offer->offer_type == 'Pràctiques') || old('offer_type') ==
                            'Pràctiques' ? 'checked' : '' }}>
                            <label class="form-check-label" for="offer_type">Pràctiques</label>

                        </div>
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="offer_type" id="offer_type"
                                value="Pràctiques amb opció de treball" {{ (isset($offer->offer_type) &&
                            $offer->offer_type == 'Pràctiques amb opció de treball') || old('offer_type') ==
                            'Pràctiques amb opció de treball' ? 'checked' : '' }}>
                            <label class="form-check-label" for="offer_type">Pràctiques amb opció de treball</label>

                        </div>
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="offer_type" id="offer_type"
                                value="Treball" {{ (isset($offer->offer_type) &&
                            $offer->offer_type == 'Treball') || old('offer_type') ==
                            'Treball' ? 'checked' : '' }}>
                            <label class="form-check-label" for="offer_type">Treball</label>

                        </div>
                    </div>

                    {{-- jornada --}}

                    <div class="mb-3">
                        <label for="working_day_type" class="form-label">Jornada de Treball: </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                                value="Jornada Sencera" {{ (isset($offer->working_day_type) &&
                            $offer->working_day_type == 'Jornada Sencera') || old('working_day_type') ==
                            'Jornada Sencera' ? 'checked' : '' }}>
                            <label class="form-check-label" for="working_day_type">Jornada Sencera</label>
                        </div>
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                                value="Mitja Jornada Matí" {{ (isset($offer->working_day_type) &&
                            $offer->working_day_type == 'Mitja Jornada Matí') || old('working_day_type') ==
                            'Mitja Jornada Matí' ? 'checked' : '' }}>
                            <label class="form-check-label" for="working_day_type">Mitja Jornada Matí</label>

                        </div>
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                                value="Mitja Jornada Tarda" {{ (isset($offer->working_day_type) &&
                            $offer->working_day_type == 'Mitja Jornada Tarda') || old('working_day_type') ==
                            'Mitja Jornada Tarda' ? 'checked' : '' }}>
                            <label class="form-check-label" for="working_day_type">Mitja Jornada Tarda</label>

                        </div>
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                                value="Indiferent" {{ (isset($offer->working_day_type) &&
                            $offer->working_day_type == 'Indiferent') || old('working_day_type') ==
                            'Indiferent' ? 'checked' : '' }}>
                            <label class="form-check-label" for="working_day_type">Indiferent</label>


                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="offer_sector">Sector: </label>
                        <div class="mb-3">
                            <select class="form-control" id="offer_sector" name="offer_sector"
                                aria-label=".form-select-lg">
                                <option value="Adminitració" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Adminitració')
                                    || old('offer_sector') == 'Adminitració' ? 'selected="selected"' : ''
                                    }}>Adminitració</option>
                                <option value="Comerç Internacional" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Comerç Internacional')
                                    || old('offer_sector') == 'Comerç Internacional' ? 'selected="selected"' : ''
                                    }}>Comerç Internacional</option>
                                <option value="Màrqueting i Publicitat" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Màrqueting i Publicitat')
                                    || old('offer_sector') == 'Màrqueting i Publicitat' ? 'selected="selected"' : ''
                                    }}>Màrqueting i Publicitat</option>
                                <option value="Automoció" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Automoció')
                                    || old('offer_sector') == 'Automoció' ? 'selected="selected"' : ''
                                    }}>Automoció</option>
                                <option value="Instal·lacions Elèctriques" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Instal·lacions Elèctriques')
                                    || old('offer_sector') == 'Instal·lacions Elèctriques' ? 'selected="selected"' : ''
                                    }}>Instal·lacions Elèctriques</option>
                                <option value="Elèctronica" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Elèctronica')
                                    || old('offer_sector') == 'Elèctronica' ? 'selected="selected"' : ''
                                    }}>Elèctronica</option>
                                <option value="Telecomunicacions" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Telecomunicacions')
                                    || old('offer_sector') == 'Telecomunicacions' ? 'selected="selected"' : ''
                                    }}>Telecomunicacions</option>
                                <option value="Robòtica" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Robòtica')
                                    || old('offer_sector') == 'Robòtica' ? 'selected="selected"' : ''
                                    }}>Robòtica</option>
                                <option value="Informàtica - Oci Digital i Videojocs" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Informàtica - Oci Digital i Videojocs')
                                    || old('offer_sector') == 'Informàtica - Oci Digital i Videojocs' ?
                                    'selected="selected"' : ''
                                    }}>Informàtica - Oci Digital i Videojocs
                                </option>
                                <option value="Imatge i So" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Imatge i So')
                                    || old('offer_sector') == 'Imatge i So' ? 'selected="selected"' : ''
                                    }}>Imatge i So</option>
                                <option value="Emergències Sanitàries" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Emergències Sanitàries')
                                    || old('offer_sector') == 'Emergències Sanitàries' ? 'selected="selected"' : ''
                                    }}>Emergències Sanitàries
                                </option>
                                <option value="Altres" {{ (isset($offer->offer_sector) &&
                                    $offer->offer_sector == 'Altres')
                                    || old('offer_sector') == 'Altres' ? 'selected="selected"' : ''
                                    }}>Altres</option>

                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="characteristics">Caracteristiques: </label>
                        <textarea class="form-control" id="characteristics" name="characteristics" rows="3"
                            placeholder="{{ isset($offer->characteristics)?$offer->characteristics:old('characteristics') }}"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Accepto l'emmagatzematge i tractament de
                            dades</label>
                    </div>
                    <div class="my-2"></div>

                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Enviar</span>
                    </button>

                    <div class="my-2"></div>
                    <a href="{{ url('/') }}" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Cancelar</span>
                    </a>


                </div>
            </form>

        </div>
    </div>

</div>


<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->

<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>