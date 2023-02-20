@extends('navbar')

@section('content')

<div class="container">

    <h1>Historial d'Ofertes</h1>

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

        <h1>ofertes no acceptades</h1>

        <div class="table-responsive">

            <table id="ofertes" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>company_email</th>
                        <th>company_type</th>
                        <th>company_nif</th>
                        <th>commercial_name</th>
                        <th>contact_person</th>
                        <th>company_phone</th>
                        <th>company_population</th>
                        <th>offer_type</th>
                        <th>working_day_type</th>
                        <th>offer_sector</th>
                        <th>characteristics</th>
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
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 6" data-column="5">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 7" data-column="6">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 8" data-column="7">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 9" data-column="8">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 10"
                                data-column="9">
                        </td>

                        <td>
                            <input type="text" class="form-control filter-input" placeholder="filtre 11"
                                data-column="10">
                        </td>
                        <td></td>

                    </tr>

                    <tr>

                        <td>
                            <select data-column="0" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($company_email as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="1" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($company_type as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="2" class="form-control filter-select">
                                <option value="">tria opcio</option>
                                @foreach ($company_nif as $type)
                                <option value="{{ $type }}"> {{ $type }}</option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="3" class="form-control filter-select">
                                <option value="">tria opcio 2</option>
                                @foreach ($commercial_name as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="4" class="form-control filter-select">
                                <option value="">tria opcio 2</option>
                                @foreach ($contact_person as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="5" class="form-control filter-select">
                                <option value="">tria opcio 2</option>
                                @foreach ($company_phone as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="6" class="form-control filter-select">
                                <option value="">tria opcio 2</option>
                                @foreach ($company_population as $population)
                                <option value="{{ $population }}"> {{ $population }}
                                </option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="7" class="form-control filter-select">
                                <option value="">tria opcio 3</option>
                                @foreach ($offer_type as $offer)
                                <option value="{{ $offer }}"> {{ $offer }}</option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <select data-column="8" class="form-control filter-select">
                                <option value="">tria opcio 4</option>
                                @foreach ($working_day_type as $work_day_type)
                                <option value="{{ $work_day_type }}"> {{ $work_day_type }}</option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="9" class="form-control filter-select">
                                <option value="">tria opcio 5</option>
                                @foreach ($offer_sector as $sector)
                                <option value="{{ $sector }}"> {{ $sector }}</option>
                                @endforeach
                            </select>

                        </td>

                        <td>
                            <select data-column="10" class="form-control filter-select">
                                <option value="">tria opcio 6</option>
                                @foreach ($characteristics as $characteristic)
                                <option value="{{ $characteristic }}"> {{ $characteristic }}</option>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
</script>

</script>




<script>
    $(document).ready(function () {


        console.log("{{ Auth:: user()-> type_user }}");

        var table = $('#ofertes').DataTable({
            ajax: {
                url: " {{ route('getDeletedAllData') }}"
            },
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
            },
            columns: [

                { "targets": 0, "data": 'company_email' },
                { "targets": 1, "data": 'company_type' },
                { "targets": 2, "data": 'company_nif' },
                { "targets": 3, "data": 'commercial_name' },
                { "targets": 4, "data": 'contact_person' },
                { "targets": 5, "data": 'company_phone' },
                { "targets": 6, "data": 'company_population' },
                { "targets": 7, "data": 'offer_type' },
                { "targets": 8, "data": 'working_day_type' },
                { "targets": 9, "data": 'offer_sector' },
                { "targets": 10, "data": 'characteristics' },
                {
                    "targets": 11,
                    "data": 'id',
                    orderable: false,
                    "render": function (data, type, row, meta) {

                        if ("{{ Auth:: user()-> type_user }}" == 1) {
                            return `
                                <a href="{{ url('admin/recover/${data}') }}" onclick="return confirm('Segu que vols recuperar la oferta')" class='btn btn-success'>Recuperar</a>
                                <a href="{{ url('admin/edit/${data}') }}" class='btn btn-warning'>Modificar</a> 
                                <a href="{{ url('admin/moreInfoOffer/${data}') }}" class='btn btn-secondary'>Mes informacio</a> 
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