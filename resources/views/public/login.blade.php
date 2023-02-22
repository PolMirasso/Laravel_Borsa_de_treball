<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Borsa de Treball || Login</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">



    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Benvingut de nou!</h1>
                                    </div>

                                    @if(count($errors)>0)

                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach( $errors->all() as $error)
                                            <li> {{ $error }}</li>
                                            @endforeach
                                        </ul>

                                    </div>
                                    @endif

                                    @if(Session::has('error'))

                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif


                                    <form class="user" method="post" action="{{ route('inicia-sesion') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="emailInput" aria-describedby="emailHelp" placeholder="Correu">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" id="passwordInput"
                                                placeholder="Contrasenya">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    id="rememberCheck">
                                                <label class="custom-control-label"
                                                    for="rememberCheck">Recorda'm</label>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar
                                            sessio</button>

                                        <hr>

                                        <div class="text-center">
                                            <a class="small" href="{{ route('register') }}">Crear un compte</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
</body>

</html>