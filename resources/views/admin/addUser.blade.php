<h1>registro admins</h1>

<body>
    <main class="container align-center p-5">
        <form method="post" action="{{ route('validar-admin') }}" enctype="multipart/form-data">
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

            <button type="submit" class="btn btn-primary">Registrarse</button>

        </form>
    </main>
</body>