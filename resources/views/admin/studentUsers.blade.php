@extends('navbar')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Llista estudiants actuals</h1>

<p class="mb-4"></a>Llista dels estudiants actuals.</p>

<div class="card shadow mb-4">
    <div class="card-header">

        <h6 class="m-0 font-weight-bold text-primary">Edicio d'Estudiants</h6>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="ofertes" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Nom complert</th>
                        <th>Correu</th>
                        <th>Curs</th>
                        <th>Població</th>
                        <th>Mobilitat</th>
                        <th>Acció</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Nom complert"
                                data-column="0">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Correu" data-column="1">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Curs" data-column="2">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Població" data-column="3">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Mobilitat"
                                data-column="4">
                        </td>

                        <td></td>

                    </tr>

                    <tr>
                        <td>
                            <select data-column="0" class="form-control filter-select">
                                <option value="">Nom complert</option>
                                @foreach ($username as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="1" class="form-control filter-select">
                                <option value="">Correu</option>
                                @foreach ($email as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">Curs</option>
                                @foreach ($course as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">Població</option>
                                @foreach ($population as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">Mobilitat</option>
                                @foreach ($mobility as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

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
                                <a href="{{ url('admin/user/editStudent/${data}') }}" class="btn btn-warning btn-circle">  <i class="fas fa-pencil-alt"></i> </a>
                                <a href="{{ url('admin/changePassword/${data}') }}" class="btn btn-info btn-circle"> <i class="fa fa-key"></i> </a>
                                <a href="{{ url('admin/delete/${data}') }}" onclick="return confirm('Segur que vols eliminar la conta?')" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i> </a>
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