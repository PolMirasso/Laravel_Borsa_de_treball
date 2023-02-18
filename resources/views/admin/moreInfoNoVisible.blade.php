@extends('navbar')

@section('content')

<div class="container">
    <h1>dades complertes oferta</h1>

    <div class="container">

        @if(Session::has('mensaje'))

        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('mensaje') }}
        </div>
        @endif

        @include('admin.moreInfoLayout')



        <a href="{{ url('admin/logRequests/') }}" class='btn btn-danger'>Cancelar</a>
        <a href="{{ url('admin/requestRestoreVisibility/${data}/${row.offer_id}') }}"
            onclick="return confirm('Segu que vols recuperar la peticio ')" class='btn btn-danger'>Recuperar</a>

    </div>

</div>
@endsection