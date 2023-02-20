@extends('navbar')

@section('content')

<div class="container">

    <div class="panel panel-default">

        <h1>Edicio d'Estudiants</h1>

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
                        <th>course</th>
                        <th>population</th>
                        <th>mobility</th>
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
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 4" data-column="3">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 5" data-column="4">
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
                                @foreach ($course as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($population as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($mobility as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>

                        <td></td>

                    </tr>
                </tfoot>
            </table>

            <a href="{{ route('addUsr') }}" class='btn btn-warning'>Afegir usr</a>


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
                url: " {{ route('getStudentData') }}"
            },
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
            },
            columns: [
                { "targets": 0, "data": 'username' },
                { "targets": 1, "data": 'email' },
                { "targets": 2, "data": 'course' },
                { "targets": 3, "data": 'population' },
                { "targets": 4, "data": 'mobility' },
                {
                    "targets": 5,
                    "data": 'id',
                    orderable: false,
                    "render": function (data, type, row, meta) {
                        if ('{{ Auth:: user()-> type_user }}' == 1) {
                            return `
                                    <a href="{{ url('admin/user/editStudent/${data}') }}" class='btn btn-warning'>Modificar<a/> 
                                    <a href="{{ url('admin/changePassword/${data}') }}" class='btn btn-primary'>Canviar contra<a/> 
                                    <a href="{{ url('admin/delete/${data}') }}" onclick="return confirm('Segu que vols eliminar la conta')" class='btn btn-danger'>Eliminar<a/> 
                                        `;
                        } else {
                            return `
                                    <p>No disponible</p>
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