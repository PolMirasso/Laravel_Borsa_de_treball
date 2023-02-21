@extends('navbar')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Llista d'usuaris administrador</h1>

<p class="mb-4"></a>Llista dels estudiants actuals.</p>

<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between">


        <div>
            <h6 class="m-0 font-weight-bold text-primary">Edicio d'Estudiants</h6>
        </div>

        <div>
            <a href="{{ route('addUsr') }}" class="btn btn-success btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Afegir Usuari</span>
            </a>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="ofertes" width="100%" cellspacing="0">


                <thead>
                    <tr>
                        <th>Nom Usuari</th>
                        <th>Correu</th>
                        <th>Tipus de permisos</th>
                        <th>Accio</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>
                            <select data-column="0" class="form-control filter-select">
                                <option value="">Nom Usuari</option>
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
                                <option value="">Tipus de permisos</option>
                                @foreach ($type_user as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>


                        <td></td>

                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Nom Usuari"
                                data-column="0">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Correu" data-column="1">
                        </td>

                        <td></td>
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
                                <a href="{{ url('admin/user/edit/${data}') }}" class="btn btn-warning btn-circle">  <i class="fas fa-pencil-alt"></i> </a>
                                <a href="{{ url('admin/changePassword/${data}') }}" class="btn btn-info btn-circle"> <i class="fa fa-key"></i> </a>
                                <a href="{{ url('admin/delete/${data}') }}" onclick="return confirm('Segur que vols eliminar la conta?')" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i> </a>
                                    `;
                        } else {
                            return `
                                <a href="{{ url('admin/user/edit/${data}') }}" class="btn btn-warning btn-circle">  <i class="fas fa-pencil-alt"></i> </a>
                                <a href="{{ url('admin/changePassword/${data}') }}" class="btn btn-info btn-circle"> <i class="fa fa-key"></i> </a>
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