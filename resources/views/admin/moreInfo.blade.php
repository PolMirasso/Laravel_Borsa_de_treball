@extends('navbar')

@section('content')

<div class="container">
    <h1>Dades de les Ofertes</h1>

    <div class="container">

        @if(Session::has('mensaje'))

        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('mensaje') }}
        </div>
        @endif

        @include('admin.moreInfoLayout')



        <a href="{{ url('admin/requestView/') }}" class='btn btn-danger'>Cancelar</a>
        <a href="{{ url('admin/downloadCV/'.$data->student_id ) }}" class='btn btn-warning'>Descarregar CV</a>
        <a href="{{ url('admin/downloadCV/'.$data->student_id) }}" class='btn btn-primary'>Enviar correu empresa</a>
        <a href="{{ url('admin/requestVisibility/'.$data->student_id .'/'.$data->offer_id) }}"
            onclick="return confirm('Segu que vols eliminar la peticio ')" class='btn btn-danger'>Eliminar</a>

    </div>

</div>
@endsection