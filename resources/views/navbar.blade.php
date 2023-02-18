<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light navbar-fixed-top">
        <a class="navbar-brand" href="/">Borsa treball</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav w-100">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('ManajePublicOffers') }}">PublicOffersConfig</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('usersView') }}">admin users</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('requestView') }}">requestView</a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('studentView') }}">student users </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('logRequests') }}">logRequests </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('logOffers') }}">logOffers </a>
                </li>




                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> {{
                        Auth::user()->username }} </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}">Tancar sessio</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style=" padding-top: 70px">
        @yield('content')
    </div>
    @yield('javascript')


</body>


</html>