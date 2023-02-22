@extends('navbar')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editar l'oferta</h1>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Modificar la oferta: {{ $data->commercial_name }}</h6>
            </div>
            <div class="card-body">


                <form action="{{ url('/admin/updatePublish/'.$data->offer_id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="company_email" class="form-label">Adreça electrònica: </label>
                        <input type="email" class="form-control" name="company_email"
                            value="{{ isset($data->company_email)?$data->company_email:old('company_email') }}"
                            id="company_email">
                    </div>
                    <div class="mb-3">
                        <label for="contact_person">Persona de contacte: </label>
                        <input type="text" class="form-control" name="contact_person"
                            value="{{ isset($data->contact_person)?$data->contact_person:old('contact_person') }}"
                            id="contact_person">
                    </div>

                    {{-- Tipus d'Empresa --}}

                    <div class="mb-3">
                        <label for="company_type">Tipus d'Empresa: </label>
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="company_type" id="company_type"
                                value="Empresa de Treball Temporal" {{ (isset($data->company_type) &&
                            $data->company_type == 'Empresa de Treball Temporal') || old('company_type') ==
                            'Empresa de Treball Temporal' ? 'checked' : '' }}>
                            <label class="form-check-label" for="company_type">Empresa de Treball Temporal</label>

                        </div>
                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="company_type" id="company_type"
                                value="Empresa de Selecció de Personal" {{ (isset($data->company_type) &&
                            $data->company_type == 'Empresa de Selecció de Personal') || old('company_type') ==
                            'Empresa de Selecció de Personal' ? 'checked' : '' }}>
                            <label class="form-check-label" for="company_type">Empresa de Selecció de Personal</label>

                        </div>
                        <div class="form-check">


                            <input class="form-check-input" type="radio" name="company_type" id="company_type"
                                value="Altres" {{ (isset($data->company_type) &&
                            $data->company_type == 'Altres') || old('company_type') ==
                            'Altres' ? 'checked' : '' }}>
                            <label class="form-check-label" for="company_type">Altres</label>



                        </div>

                        {{-- NIF --}}

                        <div class="mb-3">
                            </li><label for="company_nif">NIF: </label>
                            <input type="text" class="form-control" name="company_nif"
                                value="{{ isset($data->company_nif)?$data->company_nif:old('company_nif') }}"
                                id="company_nif">
                        </div>


                        {{-- Nom Comercial --}}


                        <div class="mb-3">
                            <label for="commercial_name">Nom Comercial: </label>
                            <input type="text" class="form-control" name="commercial_name"
                                value="{{ isset($data->commercial_name)?$data->commercial_name:old('commercial_name') }}"
                                id="commercial_name">
                        </div>


                        {{-- Telefon --}}

                        <div class="mb-3">
                            <label for="company_phone">Telefon: </label>
                            <input type="text" class="form-control" name="company_phone"
                                value="{{ isset($data->company_phone)?$data->company_phone:old('company_phone') }}"
                                id="company_phone">
                        </div>

                        {{-- Poblacio --}}


                        <div class="mb-3">
                            <label for="company_population">Poblacio: </label>
                            <input type="text" class="form-control" name="company_population"
                                value="{{ isset($data->company_population)?$data->company_population:old('company_population') }}"
                                id="company_population">
                        </div>

                        {{-- Tipus d'oferta --}}

                        <div class="mb-3">
                            <label for="offer_type">Tipus d'oferta: </label>

                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="offer_type" id="offer_type"
                                    value="Pràctiques" {{ (isset($data->offer_type) &&
                                $data->offer_type == 'Pràctiques') || old('offer_type') ==
                                'Pràctiques' ? 'checked' : '' }}>
                                <label class="form-check-label" for="offer_type">Pràctiques</label>

                            </div>
                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="offer_type" id="offer_type"
                                    value="Pràctiques amb opció de treball" {{ (isset($data->offer_type) &&
                                $data->offer_type == 'Pràctiques amb opció de treball') || old('offer_type') ==
                                'Pràctiques amb opció de treball' ? 'checked' : '' }}>
                                <label class="form-check-label" for="offer_type">Pràctiques amb opció de treball</label>

                            </div>
                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="offer_type" id="offer_type"
                                    value="Treball" {{ (isset($data->offer_type) &&
                                $data->offer_type == 'Treball') || old('offer_type') ==
                                'Treball' ? 'checked' : '' }}>
                                <label class="form-check-label" for="offer_type">Treball</label>

                            </div>
                        </div>

                        {{-- jornada --}}

                        <div class="mb-3">
                            <label for="working_day_type" class="form-label">Jornada de Treball: </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="working_day_type"
                                    id="working_day_type" value="Jornada Sencera" {{ (isset($data->working_day_type) &&
                                $data->working_day_type == 'Jornada Sencera') || old('working_day_type') ==
                                'Jornada Sencera' ? 'checked' : '' }}>
                                <label class="form-check-label" for="working_day_type">Jornada Sencera</label>
                            </div>
                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="working_day_type"
                                    id="working_day_type" value="Mitja Jornada Matí" {{ (isset($data->working_day_type)
                                &&
                                $data->working_day_type == 'Mitja Jornada Matí') || old('working_day_type') ==
                                'Mitja Jornada Matí' ? 'checked' : '' }}>
                                <label class="form-check-label" for="working_day_type">Mitja Jornada Matí</label>

                            </div>
                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="working_day_type"
                                    id="working_day_type" value="Mitja Jornada Tarda" {{ (isset($data->working_day_type)
                                &&
                                $data->working_day_type == 'Mitja Jornada Tarda') || old('working_day_type') ==
                                'Mitja Jornada Tarda' ? 'checked' : '' }}>
                                <label class="form-check-label" for="working_day_type">Mitja Jornada Tarda</label>

                            </div>
                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="working_day_type"
                                    id="working_day_type" value="Indiferent" {{ (isset($data->working_day_type) &&
                                $data->working_day_type == 'Indiferent') || old('working_day_type') ==
                                'Indiferent' ? 'checked' : '' }}>
                                <label class="form-check-label" for="working_day_type">Indiferent</label>


                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="offer_sector">Sector: </label>
                            <div class="mb-3">
                                <select class="form-control" id="offer_sector" name="offer_sector"
                                    aria-label=".form-select-lg">
                                    <option value="Adminitració" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Adminitració')
                                        || old('offer_sector') == 'Adminitració' ? 'selected="selected"' : ''
                                        }}>Adminitració</option>
                                    <option value="Comerç Internacional" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Comerç Internacional')
                                        || old('offer_sector') == 'Comerç Internacional' ? 'selected="selected"' : ''
                                        }}>Comerç Internacional</option>
                                    <option value="Màrqueting i Publicitat" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Màrqueting i Publicitat')
                                        || old('offer_sector') == 'Màrqueting i Publicitat' ? 'selected="selected"' : ''
                                        }}>Màrqueting i Publicitat</option>
                                    <option value="Automoció" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Automoció')
                                        || old('offer_sector') == 'Automoció' ? 'selected="selected"' : ''
                                        }}>Automoció</option>
                                    <option value="Instal·lacions Elèctriques" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Instal·lacions Elèctriques')
                                        || old('offer_sector') == 'Instal·lacions Elèctriques' ? 'selected="selected"' :
                                        ''
                                        }}>Instal·lacions Elèctriques</option>
                                    <option value="Elèctronica" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Elèctronica')
                                        || old('offer_sector') == 'Elèctronica' ? 'selected="selected"' : ''
                                        }}>Elèctronica</option>
                                    <option value="Telecomunicacions" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Telecomunicacions')
                                        || old('offer_sector') == 'Telecomunicacions' ? 'selected="selected"' : ''
                                        }}>Telecomunicacions</option>
                                    <option value="Robòtica" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Robòtica')
                                        || old('offer_sector') == 'Robòtica' ? 'selected="selected"' : ''
                                        }}>Robòtica</option>
                                    <option value="Informàtica - Oci Digital i Videojocs" {{ (isset($data->
                                        offer_sector) &&
                                        $data->offer_sector == 'Informàtica - Oci Digital i Videojocs')
                                        || old('offer_sector') == 'Informàtica - Oci Digital i Videojocs' ?
                                        'selected="selected"' : ''
                                        }}>Informàtica - Oci Digital i Videojocs
                                    </option>
                                    <option value="Imatge i So" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Imatge i So')
                                        || old('offer_sector') == 'Imatge i So' ? 'selected="selected"' : ''
                                        }}>Imatge i So</option>
                                    <option value="Emergències Sanitàries" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Emergències Sanitàries')
                                        || old('offer_sector') == 'Emergències Sanitàries' ? 'selected="selected"' : ''
                                        }}>Emergències Sanitàries
                                    </option>
                                    <option value="Altres" {{ (isset($data->offer_sector) &&
                                        $data->offer_sector == 'Altres')
                                        || old('offer_sector') == 'Altres' ? 'selected="selected"' : ''
                                        }}>Altres</option>

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="characteristics">Caracteristiques: </label>
                            <textarea class="form-control" id="characteristics" name="characteristics" rows="3"
                                placeholder="{{ isset($data->characteristics)?$data->characteristics:old('characteristics') }}"></textarea>
                        </div>


                        <div class="my-2"></div>

                        <a type="submit" class="btn btn-success btn-icon-split"
                            onclick="return confirm(`Segur que vols acceptar l'oferta?`)">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Guardar i publicar</span>
                        </a>

                        <a href="{{ url('admin/') }}" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Cancelar</span>
                        </a>


                    </div>
                </form>


            </div>
        </div>

    </div>
</div>

@endsection