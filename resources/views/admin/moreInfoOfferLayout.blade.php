@if($modo == "infoPublic")
<div class="col-lg-6">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dades de la oferta: {{ $data->commercial_name }}</h6>
        </div>
        <div class="card-body">


            <ul class="list-group list-group-light">
                <li class="list-group-item border-0"><strong class="text-info">Id Oferta:</strong> {{
                    $data->offer_id }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Correu:</strong> {{
                    $data->company_email }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Tipus empresa:</strong> {{
                    $data->company_type }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">NIF:</strong> {{ $data->company_nif
                    }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Nom empresa::</strong> {{
                    $data->commercial_name }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Persona contacte:</strong> {{
                    $data->contact_person }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Telefon contacte:</strong> {{
                    $data->company_phone }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Poblacio companya:</strong> {{
                    $data->company_population }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Tipus oferta:</strong> {{
                    $data->offer_type }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Tipus jornada:</strong> {{
                    $data->working_day_type }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Sector oferta:</strong> {{
                    $data->offer_sector }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Caracteristiques:</strong> {{
                    $data->characteristics }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Estat de la oferta:</strong> {{
                    $data->offer_state }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Creada: </strong> {{
                    $data->created_at }}
                </li>
            </ul>

            <br>

            <div class="col-lg-12">

                <a href="{{ url('admin/accept/${data}') }}" class="btn btn-success btn-icon-split"
                    onclick="return confirm(`Segur que vols acceptar l'oferta?`)">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Acceptar</span>
                </a>


                <a href="{{ url('admin/edit/${data}') }}" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fas fa-pencil-alt"></i>
                    </span>
                    <span class="text">Modificar</span>
                </a>


                <a href="{{ url('admin/deny/${data}') }}" class="btn btn-danger btn-icon-split"
                    onclick="return confirm(`Segur que vols eliminar l'oferta?`)">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Denegar</span>
                </a>

                <a href="{{ url('admin/') }}" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cancelar</span>
                </a>
            </div>
        </div>
    </div>

</div>


@endif

@if($modo == "infoOfertaAlumne")

<div class="col-lg-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dades de l'alumne: {{ $data->student->username }}</h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-light">

                <li class="list-group-item border-0"><strong class="text-info">username:</strong> {{
                    $data->student->username }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">email:</strong> {{
                    $data->student->email }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">course:</strong> {{
                    $data->student->course }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">population::</strong> {{
                    $data->student->population }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">mobility:</strong> {{
                    $data->student->mobility }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">created_at:</strong> {{
                    $data->student->created_at }}
                </li>

            </ul>

        </div>
    </div>
</div>

<div class="col-lg-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dades de la petició</h6>
        </div>
        <div class="card-body">

            <ul class="list-group list-group-light">

                <li class="list-group-item border-0"><strong class="text-info">msg_user:</strong> {{
                    $data->msg_user }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">created_at:</strong> {{
                    $data->created_at }}
                </li>


            </ul>

        </div>
    </div>
</div>

<div class="col-lg-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dades de l'empresa: {{ $data->offer->commercial_name }}</h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-light">

                <li class="list-group-item border-0"><strong class="text-info">Correu:</strong> {{
                    $data->offer->company_email }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Tipus empresa:</strong> {{
                    $data->offer->company_type }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">NIF:</strong> {{
                    $data->offer->company_nif
                    }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Nom empresa::</strong> {{
                    $data->offer->commercial_name }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Persona contacte:</strong> {{
                    $data->offer->contact_person }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Telefon contacte:</strong> {{
                    $data->offer->company_phone }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Poblacio companya:</strong> {{
                    $data->offer->company_population }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Tipus oferta:</strong> {{
                    $data->offer->offer_type }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Tipus jornada:</strong> {{
                    $data->offer->working_day_type }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Sector oferta:</strong> {{
                    $data->offer->offer_sector }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Caracteristiques:</strong> {{
                    $data->offer->characteristics }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Estat de la oferta:</strong> {{
                    $data->offer->offer_state }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Creada: </strong> {{
                    $data->offer->created_at }}
                </li>
            </ul>

        </div>
    </div>
</div>


<div class="col-lg-12">

    <div class="card shadow mb-4">

        <div class="card-body">


            <a href="{{ url('admin/requestView/') }}" class='btn btn-danger'>Cancelar</a>
            <a href="{{ url('admin/downloadCV/'.$data->student_id ) }}" class='btn btn-warning'>Descarregar CV</a>
            <a href="{{ url('admin/downloadCV/'.$data->student_id) }}" class='btn btn-primary'>Enviar correu
                empresa</a>
            <a href="{{ url('admin/requestVisibility/'.$data->student_id .'/'.$data->offer_id) }}"
                onclick="return confirm('Segu que vols eliminar la peticio ')" class='btn btn-danger'>Eliminar</a>


        </div>
    </div>
</div>

@endif