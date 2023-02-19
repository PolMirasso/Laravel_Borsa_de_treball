<h1>registro</h1>
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
        <form method="post" action="{{ route('validar-registro') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="usernameInput" class="form-label">username</label>
                <input type="username" class="form-control" name="username" id="usernameInput" required
                    autocomplete="disable">
            </div>

            <div class="mb-3">
                <label for="emailInput" class="form-label">email</label>
                <input type="email" class="form-control" name="email" id="emailInput" required autocomplete="disable">
            </div>

            <div class="mb-3">
                <label for="passwordInput" class="form-label">password</label>
                <input type="password" class="form-control" name="password" id="passwordInput" required>
            </div>

            <div class="mb-3">
                <label for="courseInput" class="form-label">course</label>
                <input type="course" class="form-control" name="course" id="courseInput" required
                    autocomplete="disable">
            </div>

            <div class="mb-3">
                <label for="populationInput" class="form-label">population</label>
                <input type="population" class="form-control" name="population" id="populationInput" required
                    autocomplete="disable">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="mobility" id="mobilityInput" class="form-check-input">
                <label for="mobilityInput" class="form-check-label">mobility</label>
            </div>

            <div class="form-group">
                <label for="cv_name" class="control-label">Insertar CV: </label>
                <input class="form-control" type="file" name="cv_name" id="cv_name">
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>

        </form>
    </main>
</body>