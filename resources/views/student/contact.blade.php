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

    <form action="{{ url('/student/saveContact/'.$offer->offer_id) }}" method="post">
        @csrf

        {{ method_field('POST') }}

        <label for="text_contact">text_contact: </label>
        <input type="text" class="form-control" name="text_contact"
            value="{{ isset($offer->text_contact)?$offer->text_contact:old('text_contact') }}" id="text_contact">


        <input type="submit" class="btn btn-success" value="Insertar dades">

        <a href="{{ url('/') }}" class="btn btn-danger">Cancelar</a>

    </form>

</div>