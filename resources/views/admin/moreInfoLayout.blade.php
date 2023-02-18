<div class="form-group">

    @if(count($errors)>0)

    <div class="alert alert-danger">
        <ul>
            @foreach( $errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>

    </div>

    @endif


    {{ $data }}


    <!--separar amb dos/tres columnes les dades de alumne / empresa/ oferta-->


</div>