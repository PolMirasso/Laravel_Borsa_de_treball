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

                <!-- -->

                <form action="{{ url('/admin/updatePublish/'.$data->offer_id) }}" method="post">

                    @csrf

                    {{ method_field('PATCH') }}

                    <label for="company_email"> <strong class="text-info">company_email:</strong></label>
                    <input type="text" class="form-control" name="company_email"
                        value="{{ isset($data->company_email)?$data->company_email:old('company_email') }}"
                        id="company_email">

                    <label for="company_type"><strong class="text-info">company_type:</strong></label>
                    <input type="text" class="form-control" name="company_type"
                        value="{{ isset($data->company_type)?$data->company_type:old('company_type') }}"
                        id="company_type">

                    <label for="company_nif"><strong class="text-info">company_nif:</strong></label>
                    <input type="text" class="form-control" name="company_nif"
                        value="{{ isset($data->company_nif)?$data->company_nif:old('company_nif') }}" id="company_nif">

                    <label for="commercial_name"><strong class="text-info">commercial_name:</strong></label>
                    <input type="text" class="form-control" name="commercial_name"
                        value="{{ isset($data->commercial_name)?$data->commercial_name:old('commercial_name') }}"
                        id="commercial_name">

                    <label for="contact_person"><strong class="text-info">contact_person:</strong></label>
                    <input type="text" class="form-control" name="contact_person"
                        value="{{ isset($data->contact_person)?$data->contact_person:old('contact_person') }}"
                        id="contact_person">

                    <label for="company_phone"><strong class="text-info">company_phone:</strong></label>
                    <input type="text" class="form-control" name="company_phone"
                        value="{{ isset($data->company_phone)?$data->company_phone:old('company_phone') }}"
                        id="company_phone">

                    <label for="company_population"><strong class="text-info">company_population:</strong></label>
                    <input type="text" class="form-control" name="company_population"
                        value="{{ isset($data->company_population)?$data->company_population:old('company_population') }}"
                        id="company_population">

                    <label for="offer_type"><strong class="text-info">offer_type:</strong></label>
                    <input type="text" class="form-control" name="offer_type"
                        value="{{ isset($data->offer_type)?$data->offer_type:old('offer_type') }}" id="offer_type">

                    <label for="working_day_type"><strong class="text-info">working_day_type:</strong></label>
                    <input type="text" class="form-control" name="working_day_type"
                        value="{{ isset($data->working_day_type)?$data->working_day_type:old('working_day_type') }}"
                        id="working_day_type">

                    <label for="offer_sector"><strong class="text-info">offer_sector:</strong></label>
                    <input type="text" class="form-control" name="offer_sector"
                        value="{{ isset($data->offer_sector)?$data->offer_sector:old('offer_sector') }}"
                        id="offer_sector">



                    <label for="characteristics"><strong class="text-info">characteristics:</strong></label>
                    <input type="text" class="form-control" name="characteristics"
                        value="{{ isset($data->characteristics)?$data->characteristics:old('characteristics') }}"
                        id="characteristics">

                    <br>

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


                </form>

            </div>
        </div>

    </div>
</div>

@endsection