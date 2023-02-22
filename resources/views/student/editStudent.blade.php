<h1>edit student</h1>

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
        <form action=" {{ url('/student/updateStudentData/'.$data->id) }}" method="post" enctype="multipart/form-data">

            @csrf


            <div class="mb-3">
                <label for="usernameInput">Nom alumne: </label>
                <input type="username" class="form-control" name="username"
                    value="{{ isset($data->username)?$data->username:old('username') }}" id="username">
            </div>
            <div class="mb-3">
                <label for="emailInput">Email: </label>
                <input type="email" class="form-control" name="email"
                    value="{{ isset($data->email)?$data->email:old('email') }}" id="email">
            </div>

            <div class="mb-3">
                <label for="courseInput">Curs: </label>
                <input type="course" class="form-control" name="course"
                    value="{{ isset($data->course)?$data->course:old('course') }}" id="course">
            </div>

            <div class="mb-3">
                <label for="populationInput">Població: </label>
                <input type="population" class="form-control" name="population"
                    value="{{ isset($data->population)?$data->population:old('population') }}" id="population">
            </div>

            <div class="form-group">
                <label for="cv_name" class="control-label">Nou currículum: </label>
                <input class="form-control" type="file" name="cv_name" id="cv_name"
                    value="{{ isset($data->cv_name)?$data->cv_name:old('cv_name') }}">
            </div>


            <div class="mb-3">
                <label for="passwordInput">Nova contrasenya: </label>
                <input type="password" class="form-control" name="password" value="" id="password">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
    </main>
</body>