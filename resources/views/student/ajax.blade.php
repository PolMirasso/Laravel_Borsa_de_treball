<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ofertes</div>

                    <div class="panel-body">

                        <table id="example1" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>company_type</th>
                                    <th>company_population</th>
                                    <th>offer_type</th>
                                    <th>working_day_type</th>
                                    <th>offer_sector</th>
                                    <th>characteristics</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control filter-input" placeholder="filtre 1"
                                            data-column="0">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control filter-input" placeholder="filtre 1"
                                            data-column="1">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control filter-input" placeholder="filtre 2"
                                            data-column="2">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                            data-column="3">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control filter-input" placeholder="filtre 4"
                                            data-column="4">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control filter-input" placeholder="filtre 5"
                                            data-column="5">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control filter-input" placeholder="filtre 6"
                                            data-column="6">
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <select data-column="0" class="form-control filter-select">
                                            <option value="">tria opcio</option>
                                            @foreach ($id as $type)
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
                                            @foreach ($company_population as $population)
                                            <option value="{{ $population }}"> {{ $population }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>
                                        <select data-column="3" class="form-control filter-select">
                                            <option value="">tria opcio</option>
                                            @foreach ($offer_type as $offer)
                                            <option value="{{ $offer }}"> {{ $offer }}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>
                                        <select data-column="4" class="form-control filter-select">
                                            <option value="">tria opcio</option>
                                            @foreach ($working_day_type as $work_day_type)
                                            <option value="{{ $work_day_type }}"> {{ $work_day_type }}</option>
                                            @endforeach
                                        </select>

                                    </td>

                                    <td>
                                        <select data-column="5" class="form-control filter-select">
                                            <option value="">tria opcio</option>
                                            @foreach ($offer_sector as $sector)
                                            <option value="{{ $sector }}"> {{ $sector }}</option>
                                            @endforeach
                                        </select>

                                    </td>

                                    <td>
                                        <select data-column="6" class="form-control filter-select">
                                            <option value="">tria opcio</option>
                                            @foreach ($characteristics as $characteristic)
                                            <option value="{{ $characteristic }}"> {{ $characteristic }}</option>
                                            @endforeach
                                        </select>

                                    </td>



                                </tr>
                            </tfoot>
                        </table>



                    </div>
                </div>
            </div>
        </div>







        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
        </script>

        </script>




        <script>
            $(document).ready(function () {
        var table = $('#example1').DataTable({
        ajax: {
            url: " {{ route('student.index') }}"
        },
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
        },
        columns: [
            { data: 'id' },
            { data: 'company_type' },
            { data: 'company_population' },
            { data: 'offer_type' },
            { data: 'working_day_type' },
            { data: 'offer_sector' },
            { data: 'characteristics' },
        ],
    });

    $('.filter-input').keyup(function() {
        table.column( $(this).data('column'))
            .search( $(this).val() )
            .draw();
    });

    $('.filter-select').change(function() {
        table.column( $(this).data('column'))
            .search( $(this).val() )
            .draw();
    });
});


        </script>


</body>

</html>