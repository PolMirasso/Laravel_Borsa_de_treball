@extends('navbar')


@section('content')

<h1 class="h3 mb-2 text-gray-800">Canviar Contrassenya</h1>

<p class="mb-4"></a>Modificar les dades de l'estudiant.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Canviar contrasenya administrador</h6>
    </div>
    <div class="card-body">


        <body>
            <main class="container align-center p-5">
                <form action=" {{ url('/admin/updatePassword/'.$data->id) }}" method="post">

                    @csrf

                    @include('admin.userform',['modo'=>'ChangePassword'])

                    <button type="submit" class="btn btn-primary">Guardar</button>

                </form>
            </main>
        </body>
    </div>
</div>

@endsection