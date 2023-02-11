@extends('navbar')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <h1>ofertes</h1>

                <div class="panel-body">

                    <table id="example1" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>company_type</th>
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
                                    <input type="text" class="form-control filter-input" placeholder="filtre 1"
                                        data-column="0">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="filtre 2"
                                        data-column="1">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="filtre 3"
                                        data-column="2">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="filtre 4"
                                        data-column="3">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="filtre 5"
                                        data-column="4">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="filtre 6"
                                        data-column="5">
                                </td>

                                <td></td>

                            </tr>

                            <tr>

                                <td>
                                    <select data-column="0" class="form-control filter-select">
                                        <option value="">tria opcio 1</option>
                                        @foreach ($company_type as $type)
                                        <option value="{{ $type }}"> {{ $type }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <select data-column="1" class="form-control filter-select">
                                        <option value="">tria opcio 2</option>
                                        @foreach ($company_population as $population)
                                        <option value="{{ $population }}"> {{ $population }}
                                        </option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <select data-column="2" class="form-control filter-select">
                                        <option value="">tria opcio 3</option>
                                        @foreach ($offer_type as $offer)
                                        <option value="{{ $offer }}"> {{ $offer }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <select data-column="3" class="form-control filter-select">
                                        <option value="">tria opcio 4</option>
                                        @foreach ($working_day_type as $work_day_type)
                                        <option value="{{ $work_day_type }}"> {{ $work_day_type }}</option>
                                        @endforeach
                                    </select>

                                </td>

                                <td>
                                    <select data-column="4" class="form-control filter-select">
                                        <option value="">tria opcio 5</option>
                                        @foreach ($offer_sector as $sector)
                                        <option value="{{ $sector }}"> {{ $sector }}</option>
                                        @endforeach
                                    </select>

                                </td>

                                <td>
                                    <select data-column="5" class="form-control filter-select">
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
    </div>
    @endsection


    @section('javascript')

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
    </script>

    </script>




    <script>
        $(document).ready(function () {
            var table = $('#example1').DataTable({
                ajax: {
                    url: " {{ route('getData') }}"
                },
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
                },
                columns: [
                    { "targets": 0, "data": 'company_type' },
                    { "targets": 1, "data": 'company_population' },
                    { "targets": 2, "data": 'offer_type' },
                    { "targets": 3, "data": 'working_day_type' },
                    { "targets": 4, "data": 'offer_sector' },
                    { "targets": 5, "data": 'characteristics' },
                    {
                        "targets": 6,
                        "data": 'id',
                        orderable: false,
                        "render": function (data, type, row, meta) {
                            return `<a href="{{ url('student/contact/${data}') }}" class='btn btn-warning'>Contactar<a/>`;
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