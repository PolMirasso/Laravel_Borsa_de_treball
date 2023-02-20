@extends('navbar')

@section('content')

<div class="container">
    <h1>Dades de l'oferta</h1>

    <div class="container">

        @if(Session::has('mensaje'))

        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('mensaje') }}
        </div>
        @endif

        @include('admin.moreInfoOfferLayout')


        <a href="{{ url('admin/accept/${data}') }}" onclick="return confirm('Segu que vols acceptar la oferta')"
            class='btn btn-success'>Acceptar</a>
        <a href="{{ url('admin/edit/${data}') }}" class='btn btn-warning'>Modificar</a>
        <a href="{{ url('admin/deny/${data}') }}" onclick="return confirm('Segu que vols eliminar la oferta')"
            class='btn btn-danger'>Eliminar</a>

        <a href="{{ url('admin/logOffers/') }}" class='btn btn-danger'>Cancelar</a>

    </div>

</div>
@endsection