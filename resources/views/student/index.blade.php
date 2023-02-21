@extends('navbar')

@section('topbar')
<h1 class="h3 mb-2 text-gray-800">Llista peticions publiques</h1>


@endsection

@section('content')
<p class="mb-4"></a>Llista de les peticions pendents de ser publicades.</p>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Peticions Pendents</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">


            <table class="table table-bordered" id="ofertes" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Tipus oferta</th>
                        <th>Població</th>
                        <th>Tipus Jornada</th>
                        <th>Sector</th>
                        <th>Característiques</th>
                        <th>Data publicació</th>
                        <th>Acció</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Tipus oferta"
                                data-column=" 0">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Població" data-column="1">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Tipus Jornada"
                                data-column="2">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Sector" data-column="3">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Característiques"
                                data-column="4">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Data publicació"
                                data-column="5">
                        </td>


                        <td></td>

                    </tr>

                    <tr>

                        <td>
                            <select data-column="0" class="form-control filter-select">
                                <option value="">Tipus oferta</option>
                                @foreach ($offer_type as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="1" class="form-control filter-select">
                                <option value="">Població</option>
                                @foreach ($company_population as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">Tipus Jornada</option>
                                @foreach ($working_day_type as $offer)
                                <option value="{{ $offer }}"> {{ $offer }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="3" class="form-control filter-select">
                                <option value="">Sector</option>
                                @foreach ($offer_sector as $work_day_type)
                                <option value="{{ $work_day_type }}"> {{ $work_day_type }}</option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="4" class="form-control filter-select">
                                <option value="">Característiques</option>
                                @foreach ($characteristics as $sector)
                                <option value="{{ $sector }}"> {{ $sector }}</option>
                                @endforeach
                            </select>

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
                url: " {{ route('getData') }}"
            },
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
            },
            columns: [
                { "targets": 1, "data": 'offer_type' },
                { "targets": 2, "data": 'company_population' },
                { "targets": 3, "data": 'working_day_type' },
                { "targets": 4, "data": 'offer_sector' },
                { "targets": 5, "data": 'characteristics' },
                { "targets": 6, "data": 'updated_at_format' },
                {
                    "targets": 7,
                    "data": 'id',
                    orderable: false,
                    "render": function (data, type, row, meta) {
                        return `<a href="{{ url('student/contact/${data}') }}" class="btn btn-warning btn-circle"><i class="fas fa-handshake"></i></a>`
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