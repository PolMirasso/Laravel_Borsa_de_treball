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

        <label for="company_email">company_email: </label>
        <input type="text" class="form-control" name="company_email"
            value="{{ isset($offer->company_email)?$offer->company_email:old('company_email') }}" id="company_email">

        <label for="company_type">company_type: </label>
        <input type="text" class="form-control" name="company_type"
            value="{{ isset($offer->company_type)?$offer->company_type:old('company_type') }}" id="company_type">

        <label for="company_nif">company_nif: </label>
        <input type="text" class="form-control" name="company_nif"
            value="{{ isset($offer->company_nif)?$offer->company_nif:old('company_nif') }}" id="company_nif">

        <label for="commercial_name">commercial_name: </label>
        <input type="text" class="form-control" name="commercial_name"
            value="{{ isset($offer->commercial_name)?$offer->commercial_name:old('commercial_name') }}"
            id="commercial_name">

        <label for="contact_person">contact_person: </label>
        <input type="text" class="form-control" name="contact_person"
            value="{{ isset($offer->contact_person)?$offer->contact_person:old('contact_person') }}"
            id="contact_person">

        <label for="company_phone">company_phone: </label>
        <input type="text" class="form-control" name="company_phone"
            value="{{ isset($offer->company_phone)?$offer->company_phone:old('company_phone') }}" id="company_phone">

        <label for="company_population">company_population: </label>
        <input type="text" class="form-control" name="company_population"
            value="{{ isset($offer->company_population)?$offer->company_population:old('company_population') }}"
            id="company_population">


        <label for="offer_type">offer_type: </label>
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
        <input type="text" class="form-control" name="characteristics"
            value="{{ isset($offer->characteristics)?$offer->characteristics:old('characteristics') }}"
            id="characteristics">


        <input type="submit" class="btn btn-success" value="Insertar dades">

        <a href="{{ url('/') }}" class="btn btn-danger">Cancelar</a>

    </form>

</div>