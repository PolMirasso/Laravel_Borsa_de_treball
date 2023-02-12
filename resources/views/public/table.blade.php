<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.css">



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<div class="container" style=" padding-top: 70px">

    <div class="container">
        <div class="panel panel-default">

            <h1>ofertes</h1>

            <div class="table-responsive">

                <table id="ofertes" class="display" style="width:100%">
                    <thead>
                        <tr>
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


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js">
</script>

</script>




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
                { "targets": 0, "data": 'company_type' },
                { "targets": 1, "data": 'company_population' },
                { "targets": 2, "data": 'offer_type' },
                { "targets": 3, "data": 'working_day_type' },
                { "targets": 4, "data": 'offer_sector' },
                { "targets": 5, "data": 'characteristics' },

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

</body>


</html>