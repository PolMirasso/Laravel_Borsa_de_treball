<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Borsa de Treball || Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

</head>

<body class="bg-gradient-primary">

    <div class=" container">
        <form method="post" action="{{ route('validar-registro') }}" enctype="multipart/form-data">
            @csrf
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registrar</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="usernameInput" class="form-label">Nom i Cognoms</label>
                                            <input type="username" class="form-control" name="username"
                                                id="usernameInput" required autocomplete="disable">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="emailInput" class="form-label">Correu</label>
                                            <input type="email" class="form-control" name="email" id="emailInput"
                                                required autocomplete="disable">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordInput" class="form-label">Contrasenya</label>
                                        <input type="password" class="form-control" name="password" id="passwordInput"
                                            required>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="courseInput" class="form-label">Curs</label>
                                            <input type="course" class="form-control" name="course" id="courseInput"
                                                required autocomplete="disable">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="populationInput" class="form-label">Població</label>
                                            <input type="population" class="form-control" name="population"
                                                id="populationInput" required autocomplete="disable">
                                        </div>

                                    </div>

                                    <div class="col-sm-12 custom-file">
                                        <label for="cv_name" class="custom-file-label">Seleccionar
                                            Archivo</label>
                                        <input class="custom-file-input" type="file" name="cv_name" id="cv_name"
                                            lang="es">
                                    </div>

                                    <div class="form-check mb-3 mt-3">
                                        <input class="form-check-input" type="checkbox" name="mobility"
                                            id="mobilityInput">
                                        <label class="form-check-label" for="mobilityInput">
                                            Mobilitat
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-3">Registrarse</button>

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
                                </form>
                                <div class="text-center">
                                    <a class="small" href="{{ url('../../login') }}">Tens una compta ja? Entra!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#cv_name').on('change', function () {
                var filename = $(this).val().split('\\').pop();
                $(this).siblings('.custom-file-label').html(filename);
            });
        });
    </script>

</body>

</html>