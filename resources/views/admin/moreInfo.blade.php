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

        <div class="form-group">

            @if(count($errors)>0)

            <div class="alert alert-danger">
                <ul>
                    @foreach( $errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
                </ul>

            </div>

            @endif


            {{ $data }}

            <!--separar amb dos/tres columnes les dades de alumne / empresa/ oferta-->


        </div>
        <a href="{{ url('admin/requestView/') }}" class='btn btn-danger'>Cancelar</a>

    </div>

</div>
@endsection