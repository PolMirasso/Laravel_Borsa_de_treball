<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">



</head>

<body>
    <div class="header">
        @yield("header")
    </div>

    @if(Session::has('mensaje'))

    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ Session::get('mensaje') }}
    </div>
    @endif

    <div class="content">
        @yield("content_info")
    </div>

    <div class="footer">
        <p>footer</p>
    </div>
</body>

</html>