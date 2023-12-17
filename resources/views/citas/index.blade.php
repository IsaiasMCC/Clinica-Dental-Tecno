@extends('layouts.myCustonLayout')

@section('title', 'Citas')

@section('content_header', 'Agendar Citas')

@section('style')
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">

<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
@endsection

@section('script')
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<!-- Custom and plugin javascript -->
{{-- <script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script> --}}

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                // { extend: 'copy'},
                // {extend: 'csv'},
                // {extend: 'excel', title: 'ExampleFile'},
                // {extend: 'pdf', title: 'ExampleFile'},

                {
                 customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '15px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                }
                }
            ]

        });

    });

</script>

@endsection


@section('content')
<div class="row">

    <div class="ml-5 mb-2">
        <a href="{{route('citas.create')}}" type="button" class="btn btn-clock btn-primary"> Agendar Cita </a>
    </div>


    <div class="col-lg-12">
        <div class="ibox-content">

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                            <th>Descripción</th>
                            <th>Paciente</th>
                            <th>Odontologo</th>
                            <th>Acción</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $cita)
                        <tr class="gradeX">
                            <td>{{ $cita->id }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->estado }}</td>
                            <td>{{ $cita->motivo }}</td>
                            <td>{{ $cita->user_paciente->name }}</td>
                            <td>{{ $cita->user_odontologo->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route("citas.edit", $cita->id) }}"> <i
                                        class="fa fa-pencil" aria-hidden="true"></i> </a>
                                <a class="btn btn-danger" href="{{ route("citas.show", $cita->id) }}"> <i
                                        class="fa fa-trash-o" aria-hidden="true"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


@endsection
