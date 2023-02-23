<!DOCTYPE html>
<g="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Borsa Treball</title>

        <link rel="icon" href="{{ asset('img/cropped-estrella.ico') }}" />

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" type="text/css">

        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}">
    </head>

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <a href="{{ url('/') }}" class="h1 text-gray-800">Borsa de treball</a>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">




            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="{{ url('/login') }}" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>

                </a>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="{{ url('/register') }}" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Register</span>

                </a>
            </li>
        </ul>




    </nav>


    <div style="padding-left: 2%; padding-right: 2%;">
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

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="Tipus oferta"
                                        data-column=" 0">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="Població"
                                        data-column="1">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="Tipus Jornada"
                                        data-column="2">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="Sector"
                                        data-column="3">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="Característiques"
                                        data-column="4">
                                </td>
                                <td>
                                    <input type="text" class="form-control filter-input" placeholder="Data publicació"
                                        data-column="5">
                                </td>



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

                                <td></td>
                                <td></td>

                            </tr>
                        </tfoot>
                    </table>



                </div>
            </div>

        </div>
    </div>



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