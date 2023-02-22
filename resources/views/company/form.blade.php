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

    <div class="alert alert-danger">
        <ul>
            @foreach( $errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulari Empreses</h6>
        </div>
        <div class="card-body">
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
                {{-- RADIOBUTTON --}}
                <div class="mb-3">
                    <label for="company_type">Tipus d'Empresa: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="company_type"
                            value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Empresa de Treball Temporal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="company_type"
                            value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Empresa de Selecció de Personal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="company_type"
                            value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            ALTRES
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    </li><label for="company_nif">NIF: </label>
                    <input type="text" class="form-control" name="company_nif"
                        value="{{ isset($offer->company_nif)?$offer->company_nif:old('company_nif') }}"
                        id="company_nif">
                </div>

                <div class="mb-3">
                    <label for="commercial_name">Nom Comercial: </label>
                    <input type="text" class="form-control" name="commercial_name"
                        value="{{ isset($offer->commercial_name)?$offer->commercial_name:old('commercial_name') }}"
                        id="commercial_name">
                </div>

                <div class="mb-3">
                    <label for="company_phone">Telefon: </label>
                    <input type="text" class="form-control" name="company_phone"
                        value="{{ isset($offer->company_phone)?$offer->company_phone:old('company_phone') }}"
                        id="company_phone">
                </div>

                <div class="mb-3">
                    <label for="company_population">Poblacio: </label>
                    <input type="text" class="form-control" name="company_population"
                        value="{{ isset($offer->company_population)?$offer->company_population:old('company_population') }}"
                        id="company_population">
                </div>

                <div class="mb-3">
                    <label for="offer_type">Tipus d'oferta: </label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="TipusOferta" id="offer_type"
                            value="offer_type">
                        <label class="form-check-label" for="exampleRadios1">
                            Pràctiques
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="TipusOferta" id="offer_type"
                            value="offer_type">
                        <label class="form-check-label" for="exampleRadios1">
                            Pràctiques amb opció de treball
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="TipusOferta" id="offer_type"
                            value="offer_type">
                        <label class="form-check-label" for="exampleRadios1">
                            Treball
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="working_day_type" class="form-label">Si es Oferta de Treball: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                            value="option1">
                        <label class="form-check-label" for="working_day_type">
                            Jornada Sencera
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                            value="option1">
                        <label class="form-check-label" for="working_day_type">
                            Mitja Jornada Matí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                            value="option1">
                        <label class="form-check-label" for="working_day_type">
                            Mitja Jornada Tarda
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="working_day_type" id="working_day_type"
                            value="option1">
                        <label class="form-check-label" for="working_day_type">
                            Indiferent
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="offer_sector">Sector: </label>
                    <div class="mb-3">
                        <select class="form-control" id="offer_sector" aria-label="Default select example" ">
                            <option name=" offer_sector" value="offer_sector">Adminitració</option>
                            <option value="offer_sector">Comerç Internacional</option>
                            <option value="offer_sector">Màrqueting i Publicitat</option>
                            <option value="offer_sector">Automociót</option>
                            <option value="offer_sector">Instal·lacions Elèctriques</option>
                            <option value="offer_sector">Elèctronica</option>
                            <option value="offer_sector">Telecomunicacions</option>
                            <option value="offer_sector">Robòtica</option>
                            <option value="offer_sector">Informàtica - Oci Digital i Videojocs</option>
                            <option value="offer_sector">Imatge i So</option>
                            <option value="offer_sector">Emergències Sanitàries</option>

                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="characteristics">Caracteristiques: </label>
                    <textarea class="form-control" id="characteristics" rows="3"></textarea>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
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