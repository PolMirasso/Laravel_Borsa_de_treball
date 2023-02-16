<h1>registro admins</h1>

<body>
    <main class="container align-center p-5">
        <form method="post" action="{{ route('validar-admin') }}" enctype="multipart/form-data">
            @csrf

            @include('admin.userform',['modo'=>'Add'])

            <button type="submit" class="btn btn-primary">Registrarse</button>

        </form>
    </main>
</body>