@extends('navbar')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Llista peticions alumnes</h1>

<p class="mb-4"></a>Llista de les peticions alumnes.</p>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Peticions Públiques</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="ofertes" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Nom alumne</th>
                        <th>Correu alumne</th>
                        <th>Curs alumne</th>
                        <th>Nom empresa</th>
                        <th>Email empresa</th>
                        <th>Tipus empresa</th>
                        <th>Acció</th>
                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Nom alumne"
                                data-column="0">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Correu alumne"
                                data-column="1">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Curs alumne"
                                data-column="2">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Nom empresa"
                                data-column="3">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Email empresa"
                                data-column="4">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Tipus empresa"
                                data-column="5">
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

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->

<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>

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
                { "targets": 3, "data": 'offer.commercial_name' },
                { "targets": 4, "data": 'offer.company_email' },
                { "targets": 5, "data": 'offer.company_type' },
                {
                    "targets": 6,
                    "data": 'student_id',
                    orderable: false,
                    "render": function (data, type, row, meta) {
                        return `
                            <a href="{{ url('admin/sendMailCompany/${data}/${row.offer_id}') }}" class="btn btn-warning btn-circle"> <i class="fa fa-envelope"></i> </a>
                            <a href="{{ url('admin/moreInfo/${data}/${row.offer_id}') }}" class="btn btn-info btn-circle"> <i class="fas fa-info-circle"></i> </a>
                            <a href="{{ url('admin/requestVisibility/${data}/${row.offer_id}') }}" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i> </a>            
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