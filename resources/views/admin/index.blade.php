@extends('navbar')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Llista peticions pendents</h1>

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

                        <th>Tipus empresa</th>
                        <th>Nom empresa</th>
                        <th>Poblacio empresa</th>
                        <th>Tipus oferta</th>
                        <th>Jornada</th>
                        <th>Sector</th>
                        <th>Accio</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Tipus empresa"
                                data-column="0">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Nom empresa"
                                data-column="1">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Poblacio empresa"
                                data-column="2">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Tipus oferta"
                                data-column="3">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Jornada" data-column="4">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Sector" data-column="5">
                        </td>

                        <td></td>

                    </tr>

                    <tr>

                        <td>
                            <select data-column="0" class="form-control filter-select">
                                <option value="">Tipus empresa</option>
                                @foreach ($company_type as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="1" class="form-control filter-select">
                                <option value="">Nom empresa</option>
                                @foreach ($commercial_name as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">Poblacio empresa</option>
                                @foreach ($company_population as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="3" class="form-control filter-select">
                                <option value="">Tipus oferta</option>
                                @foreach ($offer_type as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="4" class="form-control filter-select">
                                <option value="">Jornada</option>
                                @foreach ($working_day_type as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="5" class="form-control filter-select">
                                <option value="">Sector</option>
                                @foreach ($offer_sector as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
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


        console.log("{{ Auth:: user()-> type_user }}");

        var table = $('#ofertes').DataTable({
            ajax: {
                url: " {{ route('getAllData') }}"
            },
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
            },
            columns: [

                { "targets": 0, "data": 'company_type' },
                { "targets": 1, "data": 'commercial_name' },
                { "targets": 2, "data": 'company_population' },
                { "targets": 3, "data": 'offer_type' },
                { "targets": 4, "data": 'working_day_type' },
                { "targets": 5, "data": 'offer_sector' },
                {
                    "targets": 6,
                    "data": 'id',
                    orderable: false,
                    "render": function (data, type, row, meta) {

                        if ("{{ Auth:: user()-> type_user }}" == 1) {
                            return `
                            <a href="{{ url('admin/accept/${data}') }}" onclick="return confirm('Segu que vols acceptar la oferta')" class="btn btn-success btn-circle"> <i class="fas fa-check"></i> </a>
                            <a href="{{ url('admin/edit/${data}') }}" class="btn btn-warning btn-circle">  <i class="fas fa-pencil-alt"></i> </a>
                            <a href="{{ url('admin/moreInfoCompanyOffer/${data}') }}" class="btn btn-info btn-circle"> <i class="fas fa-info-circle"></i> </a>
                            <a href="{{ url('admin/deny/${data}') }}" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i> </a>

                            `;
                        } else {
                            return `<p>No disponible</p>`;
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