@extends('navbar')

@section('content')

<h1>logged student</h1>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@if(Session::has('mensaje'))

<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('mensaje') }}
</div>
@endif


<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id=ofertes_table>

            <thead>
                <tr>
                    <th>offer_id</th>
                    <th>company_type</th>
                    <th>company_population

                        <select name="population_filter" id="population_filter">

                            <option value="">company_population</option>

                            @foreach ($datos as $row)
                            <option value="{{ $row->company_population }}"> {{ $row->company_population }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th>offer_type</th>
                    <th>working_day_type</th>
                    <th>offer_sector</th>
                    <th>characteristics</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


<script>
    $(document).ready(function(){

        fetch_data();

        
        function fetch_data(company_population = ''){
            $('#ofertes_table').DataTable({
                processing:true,
                serverSide:true,
                ajax: {
                    url: " {{ route('student.index') }}",
                    data:{company_population:company_population}
                },
                columns:[
                    {
                        data: 'offer_id',
                        name: 'offer_id'
                    },
                    {
                        data: 'company_type',
                        name: 'company_type'
                    },
                    {
                        data: 'company_population',
                        name: 'company_population',
                        ordenable:false
                    },
                    {
                        data: 'offer_type',
                        name: 'offer_type'
                    },
                    {
                        data: 'working_day_type',
                        name: 'working_day_type'
                    },
                    {
                        data: 'offer_sector',
                        name: 'offer_sector'
                    },
                    {
                        data: 'characteristics',
                        name: 'characteristics'
                    }
                    
                ]
            });
        }
       
        
    $('#population_filter').change(function(){
        var population_id = $('#population_filter').val();

        $('#ofertes_table').DataTable().destroy();

        fetch_data(population_id);
    });

    });


</script>




@endsection