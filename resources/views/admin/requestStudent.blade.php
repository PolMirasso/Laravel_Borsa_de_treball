@extends('navbar')

@section('content')

<div class="container">

    <h1>logged admin</h1>

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
    <div class="panel panel-default">

        <h1>admin users</h1>

        <div class="table-responsive">

            <table id="ofertes" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>student username</th>
                        <th>student email</th>
                        <th>msg_user</th>
                        <th>commercial_name</th>
                        <th>company_email</th>
                        <th>company_type</th>
                        <th>characteristics</th>
                        <th>accio</th>
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
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="3">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="4">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="5">
                        </td>


                        <td></td>
                    </tr>

                </tfoot>
            </table>


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
                url: " {{ route('getStudentRequests') }}"
            },
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
            },
            columns: [

                { "targets": 0, "data": 'student.username' },
                { "targets": 1, "data": 'student.email' },
                { "targets": 2, "data": 'msg_user' },
                { "targets": 3, "data": 'offer.commercial_name' },
                { "targets": 4, "data": 'offer.company_email' },
                { "targets": 5, "data": 'offer.company_type' },
                { "targets": 6, "data": 'offer.characteristics' },
                {
                    "targets": 7,
                    "data": 'student_id',
                    orderable: false,
                    "render": function (data, type, row, meta) {
                        return `
                            <a href="{{ url('admin/moreInfo/${data}/${row.offer_id}') }}" class='btn btn-secondary'>Mes informacio</a> 
                            <a href="{{ url('admin/downloadCV/${data}') }}" class='btn btn-primary'>Enviar correu empresa</a> 
                            <a href="{{ url('admin/requestVisibility/${data}/${row.offer_id}') }}" onclick="return confirm('Segu que vols eliminar la peticio ')" class='btn btn-danger'>Eliminar</a> 
                            `;
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