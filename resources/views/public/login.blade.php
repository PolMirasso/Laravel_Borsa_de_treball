<title>login</title>


<body>
    <main class="container align-center p-5">
        <form method="post" action="{{ route('inicia-sesion') }}">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="emailInput" required autocomplete="disable">
            </div>

            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="passwordInput" required>
            </div>


            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" id="rememberCheck" class="form-check-input">
                <label for="rememberCheck" class="form-check-label">Mantindre sessio iniciada</label>
            </div>


            <td>



                <button type="submit" class="btn btn-primary">Iniciar sessio</button>
            </td>
            <div>
                <a href="{{ route('register') }}">Registrarse</a>
            </div>

        </form>
    </main>
</body>