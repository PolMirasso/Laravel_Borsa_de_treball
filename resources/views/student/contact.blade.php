

@extends('navbar')

@section('topbar')

<h1 class="h3 mb-2 text-gray-800">Petició Empresa</h1>

@endsection


@section('content')
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
        <div class="mb-3">
        <label for="text_contact">Missatge d'interes: </label>
        <textarea type="text" class="form-control" rows="3" name="text_contact"
            value="{{ isset($offer->text_contact)?$offer->text_contact:old('text_contact') }}" id="text_contact"></textarea>
        </div>
        <div class="mb-3">    
            <button type="submit" class="btn btn-success btn-icon-split"
            onclick="return confirm(`Segur que vols acceptar l'oferta?`)">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Enviar Petició</span>
        </button>

        <a href="{{ url('student/') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Cancelar</span>
        </a>
        </div>
    </form>

</div>
@endsection