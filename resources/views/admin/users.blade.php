@extends('navbar')

@section('content')

<div class="container">

    <h1>logged admin</h1>


    <div class="panel panel-default">

        <h1>admin users</h1>

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

        <div class="table-responsive">

            <table id="ofertes" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>username</th>
                        <th>email</th>
                        <th>type_user</th>
                        <th>Accio</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 1" data-column="0">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 2" data-column="1">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="2">
                        </td>

                        <td></td>

                    </tr>

                    <tr>
                        <td>
                            <select data-column="0" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($username as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="1" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($email as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($type_user as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>


                        <td></td>

                    </tr>
                </tfoot>
            </table>

            <a href="{{ route('addUsr') }}" class='btn btn-warning'>Afegir usr<a />


        </div>
    </div>

</div>
@endsection


@section('javascript')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
</script>

</script>

<script>
    $(document).ready(function () {
        var table = $('#ofertes').DataTable({
            ajax: {
                url: " {{ route('getUsersData') }}"
            },
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
            },
            columns: [
                { "targets": 0, "data": 'username' },
                { "targets": 1, "data": 'email' },
                { "targets": 2, "data": 'type_user' },
                {
                    "targets": 3,
                    "data": 'id',
                    orderable: false,
                    "render": function (data, type, row, meta) {

                        if (row.type_user != "Admin" && '{{ Auth:: user()-> type_user }}' != 2) {
                            return `
                                    <a href="{{ url('admin/user/edit/${data}') }}" class='btn btn-warning'>Modificar<a/> 
                                    <a href="{{ url('admin/changePassword/${data}') }}" class='btn btn-primary'>Canviar contra<a/> 
                                    <a href="{{ url('admin/delete/${data}') }}" onclick="return confirm('Segu que vols eliminar la conta')" class='btn btn-danger'>Eliminar<a/> 
                                        `;
                        } else {
                            return `
                                    <a href="{{ url('admin/user/edit/${data}') }}" class='btn btn-warning'>Modificar<a/> 
                                    <a href="{{ url('admin/changePassword/${data}') }}" class='btn btn-primary'>Canviar contra<a/> 
                                    `;
                        }
                    }
                }
            ],
        });
        $('.filter-input').keyup(function () {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });
        $('.filter-select').change(function () {
            table.column($(this).data('column'))
                .search($(this).val())
                .draw();
        });
    });
</script>

@endsection