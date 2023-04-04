
@extends('navbar')


@section('content')

<div class="container">
    <div class="panel panel-default">
        <h1>edit admins</h1>

        @if(Session::has('mensaje'))

        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ Session::get('mensaje') }}
        </div>
        @endif

        @if(count($errors)>0)

        <div class="alert alert-danger">
            <ul>
                @foreach( $errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>

        </div>

        @endif

        <body>
            <main class="container align-center p-5">
                <form action=" {{ url('/admin/updateAdmin/'.$data->id) }}" method="post">

                    @csrf

                    @include('admin.userform',['modo'=>'Edit'])

                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
            </main>
        </body>
    </div>
</div>
@endsection