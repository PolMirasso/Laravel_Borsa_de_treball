@extends("layouts.layout")

@section('header')

<h1>header test</h1>

@endsection



@section('content_info')

<p>sadas</p>

<a href="{{ url('/login') }}">login</a>
<br>
<a href="{{ url('/register') }}">register</a>
<br>
<a href="{{ url('company/create') }}">company</a>


@endsection