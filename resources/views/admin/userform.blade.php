@if($modo != 'ChangePassword')
<div class="mb-3">
    <label for="usernameInput">Nom usuari: </label>
    <input type="username" class="form-control" name="username"
        value="{{ isset($data->username)?$data->username:old('username') }}" id="username">
</div>
<div class="mb-3">
    <label for="emailInput">Correu: </label>
    <input type="email" class="form-control" name="email" value="{{ isset($data->email)?$data->email:old('email') }}"
        id="email">
</div>

@endif

@if($modo == "EditStudent")
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

<label for="populationInput">Nou currículum: </label>
<div class="form-group custom-file">
    <label for="cv_name" class="custom-file-label">Nou currículum</label>
    <input class="custom-file-input" type="file" name="cv_name" id="cv_name" lang="es">
</div>

@endif

@if($modo == "Add" || $modo == "ChangePassword")

<div class="mb-3">
    <label for="passwordInput">{{ $modo == 'ChangePassword' ? 'Nova contrasenya' : 'Contrasenya' }}</label>
    <input type="password" class="form-control" name="password" value="" id="password">
</div>

@endif