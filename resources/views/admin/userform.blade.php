@if($modo != 'ChangePassword')
<div class="mb-3">
    <label for="usernameInput">username: </label>
    <input type="username" class="form-control" name="username"
        value="{{ isset($data->username)?$data->username:old('username') }}" id="username">
</div>
<div class="mb-3">
    <label for="emailInput">email: </label>
    <input type="email" class="form-control" name="email" value="{{ isset($data->email)?$data->email:old('email') }}"
        id="email">
</div>

@endif

@if($modo == "EditStudent")
<div class="mb-3">
    <label for="courseInput">course: </label>
    <input type="course" class="form-control" name="course"
        value="{{ isset($data->course)?$data->course:old('course') }}" id="course">
</div>


<div class="mb-3">
    <label for="populationInput">population: </label>
    <input type="population" class="form-control" name="population"
        value="{{ isset($data->population)?$data->population:old('population') }}" id="population">
</div>

<div class="form-group">
    <label for="cv_name" class="control-label">cv_name</label>
    <input class="form-control" type="file" name="cv_name" id="cv_name"
        value="{{ isset($data->cv_name)?$data->cv_name:old('cv_name') }}">
</div>

@endif

@if($modo == "Add" || $modo == "ChangePassword")

<div class="mb-3">
    <label for="passwordInput">{{ $modo == 'ChangePassword' ? 'Nova contrasenya' : 'Contrasenya' }}</label>
    <input type="password" class="form-control" name="password" value="" id="password">
</div>

@endif