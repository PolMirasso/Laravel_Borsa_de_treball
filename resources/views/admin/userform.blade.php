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

@if($modo == "Add" || $modo == "ChangePassword")

<div class="mb-3">
    <label for="passwordInput">{{ $modo == 'ChangePassword' ? 'Nova contrasenya' : 'Contrasenya' }}</label>
    <input type="password" class="form-control" name="password" value="" id="password">
</div>

@endif