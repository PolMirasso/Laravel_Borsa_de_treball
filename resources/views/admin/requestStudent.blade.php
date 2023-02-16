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
                        <th>username</th>
                        <th>email</th>
                        <th>course</th>
                        <th>population</th>
                        <th>mobility</th>
                        <th>msg_user</th>
                        <th>company_email</th>
                        <th>company_type</th>
                        <th>company_nif</th>
                        <th>commercial_name</th>
                        <th>contact_person</th>
                        <th>company_phone</th>
                        <th>company_population</th>
                        <th>offer_type</th>
                        <th>working_day_type</th>
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
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="6">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="7">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="8">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3" data-column="9">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                data-column="10">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                data-column="11">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                data-column="12">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                data-column="13">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                data-column="14">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                data-column="15">
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
                { "targets": 2, "data": 'student.course' },
                { "targets": 3, "data": 'student.population' },
                { "targets": 4, "data": 'student.mobility' },
                { "targets": 5, "data": 'msg_user' },
                { "targets": 6, "data": 'offer.company_email' },
                { "targets": 7, "data": 'offer.company_type' },
                { "targets": 8, "data": 'offer.company_nif' },
                { "targets": 9, "data": 'offer.commercial_name' },
                { "targets": 10, "data": 'offer.contact_person' },
                { "targets": 11, "data": 'offer.company_phone' },
                { "targets": 12, "data": 'offer.company_population' },
                { "targets": 13, "data": 'offer.offer_type' },
                { "targets": 14, "data": 'offer.working_day_type' },
                { "targets": 15, "data": 'offer.characteristics' },
                //       { "targets": 16, "data": 'student.cv_name' },
                {
                    "targets": 16,
                    "data": 'student_id',
                    orderable: false,
                    "render": function (data, type, row, meta) {
                        return `
                            <a href="{{ url('admin/downloadCV/${data}') }}" class='btn btn-warning'>Descarregar CV<a/> 
                            <a href="{{ url('admin/requestVisibility/${data}/${row.offer_id}') }}" onclick="return confirm('Segu que vols eliminar la peticio ')" class='btn btn-danger'>Eliminar<a/> 
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