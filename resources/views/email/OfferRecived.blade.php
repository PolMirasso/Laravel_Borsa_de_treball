<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body1'] }}</p>
    <p>{{ $details['body2'] }}</p>
    @if($details['body3'] != "")
    <p>{{ $details['body3'] }}</p>
    <p>{{ $details['body4'] }}</p>
    <p>{{ $details['body5'] }}</p>
    <p>{{ $details['body6'] }}</p>
    <p>{{ $details['body7'] }}</p>
    <p>{{ $details['body8'] }}</p>
    @endif
</body>

</html>