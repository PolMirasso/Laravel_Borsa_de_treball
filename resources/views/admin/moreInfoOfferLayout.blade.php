@if($modo == "infoPublic" || $modo == "logOfertes")
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

                @if($modo == "infoPublic")
                <a href="{{ url('admin/accept/'.$data->offer_id) }}" class="btn btn-success btn-icon-split"
                    onclick="return confirm(`Segur que vols acceptar l'oferta?`)">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Acceptar</span>
                </a>


                <a href="{{ url('admin/edit/'.$data->offer_id) }}" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fas fa-pencil-alt"></i>
                    </span>
                    <span class="text">Modificar</span>
                </a>


                <a href="{{ url('admin/deny/'.$data->offer_id) }}" class="btn btn-danger btn-icon-split"
                    onclick="return confirm(`Segur que vols denegar l'oferta?`)">
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
                @endif


                @if($modo == "logOfertes")

                <a href="{{ url('admin/recover/'.$data->offer_id) }}" class="btn btn-success btn-icon-split"
                    onclick="return confirm(`Segur que vols recuperar l'oferta?`)">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash-restore"></i>
                    </span>
                    <span class="text">Recuperar</span>
                </a>


                <a href="{{ url('admin/edit/'.$data->offer_id) }}" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fas fa-pencil-alt"></i>
                    </span>
                    <span class="text">Modificar</span>
                </a>

                <a href="{{ url('admin/logOffers') }}" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Cancelar</span>
                </a>
                @endif
            </div>


        </div>
    </div>

</div>


@endif

@if($modo == "infoOfertaAlumne" || $modo == "infoOfertaAlumnePrivate")

<div class="col-lg-4">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dades de l'alumne: {{ $data->student->username }}</h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-light">

                <li class="list-group-item border-0"><strong class="text-info">Nom complert:</strong> {{
                    $data->student->username }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Correu:</strong> {{
                    $data->student->email }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Curs:</strong> {{
                    $data->student->course }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Població:</strong> {{
                    $data->student->population }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Mobilitat:</strong> {{
                    $data->student->mobility }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Data creacio conta:</strong> {{
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

                <li class="list-group-item border-0"><strong class="text-info">Missatje alumne:</strong> {{
                    $data->msg_user }}
                </li>
                <li class="list-group-item border-0"><strong class="text-info">Data petició alumne:</strong> {{
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
                    $data->offer->company_nif }}
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

            @if($modo == "infoOfertaAlumne")


            <a href="{{ url('admin/downloadCV/'.$data->student->id ) }}" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-file"></i>
                </span>
                <span class="text">Descarregar CV</span>
            </a>


            <a class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#confirmMail">
                <span class="icon text-white-50">
                    <i class="fa fa-envelope"></i>
                </span>
                <span class="text">Enviar correu empresa</span>
            </a>


            <a href="{{ url('admin/requestVisibility/'.$data->student->id .'/'.$data->offer->offer_id) }}"
                class="btn btn-danger btn-icon-split" onclick="return confirm(`Segur que vols denegar la petició?`)">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Denegar</span>
            </a>

            <a href="{{ url('admin/requestView') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Cancelar</span>
            </a>
            @endif

            @if($modo == "infoOfertaAlumnePrivate")

            <a href="{{ url('admin/requestRestoreVisibility/'.$data->student->id .'/'.$data->offer->offer_id) }}"
                class="btn btn-success btn-icon-split" onclick="return confirm(`Segur que vols recuperar la peticio?`)">
                <span class="icon text-white-50">
                    <i class="fas fa-trash-restore"></i>
                </span>
                <span class="text">Recuperar</span>
            </a>

            <a href="{{ url('admin/logRequests') }}" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Cancelar</span>
            </a>

            @endif
        </div>
    </div>
</div>

@endif

<div class="modal fade" id="confirmMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enviar correu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                Borsa de treball | La Salle Mollerussa
                <br>
                <br>
                Sol·licitud de {{ $data->student->username }},
                <br>
                Benvolgut/uda {{ $data->offer->contact_person }},
                <br>
                Li escric en nom de {{ Auth::user()->username }} per informar-li que hem rebut una sol·licitud de
                {{ $data->offer->offer_type }} de {{ $data->student->username }} per la seva
                empresa.",
                <br>
                Com a part del procés de sol·licitud, {{ $data->student->username }} ha proporcionat el seu currículum
                que pot
                trobar adjunt a aquest correu electrònic. A més a més, a través del nostre lloc
                web, hem verificat la seva experiència i habilitats relacionades amb el lloc de treball.",
                <br>
                Si està interessat/ada en procedir amb la sol·licitud de {{ $data->offer->commercial_name }}, si us plau
                faci'ns-ho saber perquè puguem proporcionar-li més detalls i posar-lo en contacte amb el
                candidat.",
                <br>
                Gràcies pel seu temps i consideració.
                <br>
                Atentament
                {{ Auth::user()->username }}
                <br>
                {{ Auth::user()->email }}
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary"
                    href="{{ url('admin/sendMailCompany/'.$data->student->id.'/'.$data->offer->offer_id) }}">Enviar
                    correu</a>
            </div>
        </div>
    </div>
</div>