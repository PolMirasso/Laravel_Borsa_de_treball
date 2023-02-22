@extends('navbar')


@section('content')

<h1 class="h3 mb-2 text-gray-800">Editar Estudiant</h1>

<p class="mb-4"></a>Modificar les dades de l'estudiant.</p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dades estudiant</h6>
    </div>
    <div class="card-body">

        <body>
            <main class="container align-center p-3">
                <form action=" {{ url('/admin/updateStudent/'.$data->id) }}" method="post"
                    enctype="multipart/form-data">

                    @csrf

                    @include('admin.userform',['modo'=>'EditStudent'])

                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>

                </form>
            </main>
        </body>
    </div>
</div>
@endsection