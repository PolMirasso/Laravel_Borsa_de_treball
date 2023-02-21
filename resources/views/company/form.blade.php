<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Borsa Treball</title>

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

    <form action="{{ url('/company') }}" method="post">

        @csrf
        <div class="col-sm-12">
            <label for="company_email">Email: </label>
            <input type="text" class="form-control" name="company_email"
                value="{{ isset($offer->company_email)?$offer->company_email:old('company_email') }}" id="company_email">
            <!--Desplegable-->
            <label for="company_type">Tipus D'Empresa: </label>
            <input type="text" class="form-control" name="company_type"
                value="{{ isset($offer->company_type)?$offer->company_type:old('company_type') }}" id="company_type">

            <label for="company_nif">NIF: </label>
            <input type="text" class="form-control" name="company_nif"
                value="{{ isset($offer->company_nif)?$offer->company_nif:old('company_nif') }}" id="company_nif">

            <label for="commercial_name">Nom Empresa: </label>
            <input type="text" class="form-control" name="commercial_name"
                value="{{ isset($offer->commercial_name)?$offer->commercial_name:old('commercial_name') }}"
                id="commercial_name">

            <label for="contact_person">Persona de contacte: </label>
            <input type="text" class="form-control" name="contact_person"
                value="{{ isset($offer->contact_person)?$offer->contact_person:old('contact_person') }}"
                id="contact_person">

            <label for="company_phone">Telefon: </label>
            <input type="text" class="form-control" name="company_phone"
                value="{{ isset($offer->company_phone)?$offer->company_phone:old('company_phone') }}" id="company_phone">
        </div>
        <div class="col-sm-12">
            <label for="company_population">Poblacio: </label>
            <input type="text" class="form-control" name="company_population"
                value="{{ isset($offer->company_population)?$offer->company_population:old('company_population') }}"
                id="company_population">

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Tipus d'oferta
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Jornada Sencera</a></li>
                    <li><a class="dropdown-item" href="#">Mitja Jornada</a></li>
                    <li><a class="dropdown-item" href="#">Indiferent</a></li>
                    </ul>
                </div>

            <label for="offer_type">Tipus d'oferta: </label>
            <input type="text" class="form-control" name="offer_type"
                value="{{ isset($offer->offer_type)?$offer->offer_type:old('offer_type') }}" id="offer_type">

            <label for="working_day_type">working_day_type: </label>
            <input type="text" class="form-control" name="working_day_type"
                value="{{ isset($offer->working_day_type)?$offer->working_day_type:old('working_day_type') }}"
                id="working_day_type">

            <label for="offer_sector">offer_sector: </label>
            <input type="text" class="form-control" name="offer_sector"
                value="{{ isset($offer->offer_sector)?$offer->offer_sector:old('offer_sector') }}" id="offer_sector">

            <label for="characteristics">characteristics: </label>
            <input type="textarea" class="form-control" name="characteristics"
                value="{{ isset($offer->characteristics)?$offer->characteristics:old('characteristics') }}"
                id="characteristics">

        </div>
        <br>
        <input type="submit" class="btn btn-success" value="Insertar dades">

        <a href="{{ url('/') }}" class="btn btn-danger">Cancelar</a>

    </form>

</div>
