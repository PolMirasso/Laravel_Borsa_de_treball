@extends('navbar')

@section('content')

<h1>logged student</h1>

@if(Session::has('mensaje'))

<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('mensaje') }}
</div>
@endif

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>offer_id</th>
            <th>company_type</th>
            <th>company_population</th>
            <th>offer_type</th>
            <th>working_day_type</th>
            <th>offer_sector</th>
            <th>characteristics</th>
            <th>created_at</th>
            <th>accio</th>

        </tr>
    </thead>

    <tabodya>
        @foreach ($offers as $offer)
        <tr>
            <td>{{ $offer->offer_id }}</td>
            <td>{{ $offer->company_type }}</td>
            <td>{{ $offer->company_population }}</td>
            <td>{{ $offer->offer_type }}</td>
            <td>{{ $offer->working_day_type }}</td>
            <td>{{ $offer->offer_sector }}</td>
            <td>{{ $offer->characteristics }}</td>
            <td>{{ $offer->created_at }}</td>
            <td>



                <a href="{{ url('/llibres/'.$offer->offer_id.'/edit') }}" class="btn btn-warning">
                    Demanar
                </a>


            </td>
        </tr>
        @endforeach

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
                <input type="text" class="form-control filter-input" placeholder="filtre 6" data-column="6">
            </td>
            <td>
                <input type="text" class="form-control filter-input" placeholder="filtre 6" data-column="7">
            </td>


        </tr>
    </tabodya>
</table>




<h1>test 2</h1>
<div class="panel-body">
    <table class="table" id="datatable">
        <thead>
            <tr>
                <th>offer_id</th>
                <th>company_type</th>
                <th>company_population</th>
                <th>offer_type</th>
                <th>working_day_type</th>
                <th>offer_sector</th>
                <th>characteristics</th>
                <th>created_at</th>
                <th>accio</th>
            </tr>
        </thead>

        <tbody>
        </tbody>

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
            </tr>

            <tr>
                <td>
                    <select data-column="0" class="form-control filter-select">
                        <option value="">tria opcio</option>
                        @foreach ($offers as $offer)
                        <option value="{{ $offer->offer_id }}"> {{ $offer->offer_id }}</option>
                        @endforeach
                    </select>

                </td>
                <td>
                    <select data-column="0" class="form-control filter-select">
                        <option value="">tria opcio</option>
                        @foreach ($offers as $offer)
                        <option value="{{ $offer->company_type }}"> {{ $offer->company_type }}</option>
                        @endforeach
                    </select>

                </td>
                <td>
                    <select data-column="0" class="form-control filter-select">
                        <option value="">tria opcio</option>
                        @foreach ($offers as $offer)
                        <option value="{{ $offer->company_population }}"> {{ $offer->company_population }}</option>
                        @endforeach
                    </select>

                </td>
                <td>
                    <select data-column="0" class="form-control filter-select">
                        <option value="">tria opcio</option>
                        @foreach ($offers as $offer)
                        <option value="{{ $offer->offer_type }}"> {{ $offer->offer_type }}</option>
                        @endforeach
                    </select>

                </td>
                <td>
                    <select data-column="0" class="form-control filter-select">
                        <option value="">tria opcio</option>
                        @foreach ($offers as $offer)
                        <option value="{{ $offer->working_day_type }}"> {{ $offer->working_day_type }}</option>
                        @endforeach
                    </select>

                </td>

                <td>
                    <select data-column="0" class="form-control filter-select">
                        <option value="">tria opcio</option>
                        @foreach ($offers as $offer)
                        <option value="{{ $offer->offer_sector }}"> {{ $offer->offer_sector }}</option>
                        @endforeach
                    </select>

                </td>

                <td>
                    <select data-column="0" class="form-control filter-select">
                        <option value="">tria opcio</option>
                        @foreach ($offers as $offer)
                        <option value="{{ $offer->characteristics }}"> {{ $offer->characteristics }}</option>
                        @endforeach
                    </select>

                </td>
            </tr>
        </tfoot>
    </table>


</div>


<h1>test 3</h1>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="col-md-12">

                <form>
                    <td>
                        <select data-column="0" class="form-control filter-select">
                            <option value="">tria opcio</option>
                            @foreach ($offers as $offer)
                            <option value="{{ $offer->offer_id }}"> {{ $offer->offer_id }}</option>
                            @endforeach
                        </select>

                    </td>
                    <td>
                        <select data-column="0" class="form-control filter-select">
                            <option value="">tria opcio</option>
                            @foreach ($offers as $offer)
                            <option value="{{ $offer->company_type }}"> {{ $offer->company_type }}</option>
                            @endforeach
                        </select>

                    </td>
                </form>

            </div>
        </div>
    </div>
</div>



@section('javascripts')
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function(){
        var table = $('#testTable').DataTable({
            "processing": true,
            "serverSide": true,
            'ajax': '{{ route('student.index') }}',

            'columns':[
                {'data': 'offer_id'},
                {'data': 'company_type'},
                {'data': 'company_population'},
                {'data': 'offer_type'},
                {'data': 'working_day_type'},
                {'data': 'offer_sector'},
                {'data': 'characteristics'},
                {'data': 'created_at'}
            ],
        });

        $('.filter-input').keyup(function() {
            table.columnn( $(this).data('column'))
                .search( $(this).val() )
                .draw();
        });

        $('.filter-select').change(function() {
            table.columnn( $(this).data('column'))
                .search( $(this).val() )
                .draw();
        });
    })

</script>


@stop

@endsection