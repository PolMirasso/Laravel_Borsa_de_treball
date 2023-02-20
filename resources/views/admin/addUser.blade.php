<h1>Registre d'Admins</h1>

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
        <form method="post" action="{{ route('validar-admin') }}" enctype="multipart/form-data">
            @csrf

            @include('admin.userform',['modo'=>'Add'])

            <button type="submit" class="btn btn-primary">Registrarse</button>

        </form>
    </main>
</body>