<h1>edit admins</h1>

<body>
    <main class="container align-center p-5">
        <form action=" {{ url('/admin/updateAdmin/'.$data->id) }}" method="post">

            @csrf

            @include('admin.userform',['modo'=>'Edit'])

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    </main>
</body>