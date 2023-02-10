<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Customers</div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>company_type</th>
                                        <th>company_population</th>
                                        <th>offer_type</th>
                                        <th>working_day_type</th>
                                        <th>offer_sector</th>
                                        <th>characteristics</th>
                                        <th>created_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datos as $dato)
                                    <tr>
                                        <td>{{ $dato->id }}</td>
                                        <td>{{ $dato->company_type }}</td>
                                        <td>{{ $dato->company_population }}</td>
                                        <td>{{ $dato->offer_type }}</td>
                                        <td>{{ $dato->working_day_type }}</td>
                                        <td>{{ $dato->offer_sector }}</td>
                                        <td>{{ $dato->characteristics }}</td>
                                        <td>{{ $dato->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</body>

</html>