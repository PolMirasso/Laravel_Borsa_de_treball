@extends('navbar')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dades de la petició de l'alumne</h1>
</div>

<div class="row">
    @include('admin.moreInfoOfferLayout',['modo'=>'infoOfertaAlumne'])
</div>


@endsection