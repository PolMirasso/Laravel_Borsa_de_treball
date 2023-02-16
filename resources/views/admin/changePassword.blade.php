<h1>change password</h1>

<body>
    <main class="container align-center p-5">
        <form action=" {{ url('/admin/updatePassword/'.$data->id) }}" method="post">

            @csrf

            @include('admin.userform',['modo'=>'ChangePassword'])

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    </main>
</body>