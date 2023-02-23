@extends('navbar')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Llista peticions alumnes</h1>

<p class="mb-4"></a>Llista de les peticions alumnes.</p>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Peticions Públiques</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="ofertes" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>Nom alumne</th>
                        <th>Correu alumne</th>
                        <th>Curs alumne</th>
                        <th>Nom empresa</th>
                        <th>Email empresa</th>
                        <th>Tipus empresa</th>
                        <th>Data publicació</th>
                        <th>Acció</th>
                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Nom alumne"
                                data-column="0">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Correu alumne"
                                data-column="1">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Curs alumne"
                                data-column="2">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Nom empresa"
                                data-column="3">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Email empresa"
                                data-column="4">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Tipus empresa"
                                data-column="5">
                        </td>
                        <td>
                            <input type="text" class="form-control filter-input" placeholder="Data publicació"
                                data-column="6">
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
        var table = $('#ofertes').DataTable({
            ajax: {
                url: " {{ route('getStudentRequests') }}"
            },
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.2/i18n/ca.json",
            },
            columns: [

                { "targets": 0, "data": 'student.username' },
                { "targets": 1, "data": 'student.email' },
                { "targets": 2, "data": 'student.course' },
                { "targets": 3, "data": 'offer.commercial_name' },
                { "targets": 4, "data": 'offer.company_email' },
                { "targets": 5, "data": 'offer.company_type' },
                { "targets": 6, "data": 'updated_at_format' },
                {
                    "targets": 7,
                    "data": 'student_id',
                    orderable: false,
                    "render": function (data, type, row, meta) {
                        return `
                            <a data-toggle="modal" data-target="#confirmMail" class="btn btn-warning btn-circle"> <i class="fa fa-envelope"></i> </a>
                            <a href="{{ url('admin/moreInfo/${data}/${row.offer_id}') }}" class="btn btn-info btn-circle"> <i class="fas fa-info-circle"></i> </a>
                            <a href="{{ url('admin/requestVisibility/${data}/${row.offer_id}') }}" class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i> </a>            
                            

                            <div class="modal fade" id="confirmMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Enviar correu</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        Borsa de treball | La Salle Mollerussa
                                        <br>
                                        <br>
                                        Sol·licitud de ${row.student.username},
                                        <br>
                                        Benvolgut/uda ${row.offer.contact_person},
                                        <br>
                                        Li escric en nom de {{ Auth::user()->username }} per informar-li que hem rebut una sol·licitud de
                                        ${row.offer.offer_type} de ${row.student.username} per la seva empresa.",
                                        <br>
                                        Com a part del procés de sol·licitud, ${row.student.username} ha proporcionat el seu currículum que pot
                                        trobar adjunt a aquest correu electrònic. A més a més, a través del nostre lloc
                                        web, hem verificat la seva experiència i habilitats relacionades amb el lloc de treball.",
                                        <br>
                                        Si està interessat/ada en procedir amb la sol·licitud de ${row.offer.commercial_name}, si us plau
                                        faci'ns-ho saber perquè puguem proporcionar-li més detalls i posar-lo en contacte amb el
                                        candidat.",
                                        <br>
                                        Gràcies pel seu temps i consideració.
                                        <br>
                                        Atentament
                                        {{ Auth::user()->username }}
                                        <br>
                                        {{ Auth::user()->email }}
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                        <a class="btn btn-primary" href="{{ url('admin/sendMailCompany/${data}/${row.offer_id}') }}">Enviar correu</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                            `;
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