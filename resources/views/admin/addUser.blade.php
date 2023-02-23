@extends('navbar')


@section('content')

<h1 class="h3 mb-2 text-gray-800">Registre d'Admins</h1>

<p class="mb-4"></a>Registre d'usuaris administrador amb permisos de lectura.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Canviar contrasenya administrador</h6>
    </div>
    <div class="card-body">

        <body>
            <main class="container align-center p-5">
                <form method="post" action="{{ route('validar-admin') }}" enctype="multipart/form-data">
                    @csrf

                    @include('admin.userform',['modo'=>'Add'])

                    <button type="submit" class="btn btn-primary">Registrar</button>

                </form>
            </main>
        </body>
    </div>
</div>
@endsection