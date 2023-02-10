@extends('navbar')

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>

                <div class="panel-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>company_type</th>
                                <th>company_population</th>
                                <th>offer_type</th>
                                <th>working_day_type</th>
                                <th>offer_sector</th>
                                <th>characteristics</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $dato)
                            <tr>
                                <td>{{ $dato->company_type }}</td>
                                <td>{{ $dato->company_population }}</td>
                                <td>{{ $dato->offer_type }}</td>
                                <td>{{ $dato->working_day_type }}</td>
                                <td>{{ $dato->offer_sector }}</td>
                                <td>{{ $dato->characteristics }}</td>
                                <td>{{ $dato->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>