@extends('layouts.myCustonLayout')

@section('title', 'Agenda')

@section('content_header', 'Agenda de : '.$odontologo->name)

@section('style')
<link href="{!! asset('css/bootstrap.min.css" rel="stylesheet') !!}">
    <link href="{!! asset('css/plugins/fullcalendar/fullcalendar.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/fullcalendar/fullcalendar.print.css') !!}" rel='stylesheet' media='print'>

    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

@endsection

@section('script')


<!-- Mainly scripts -->
<script src="{!! asset('js/plugins/fullcalendar/moment.min.js') !!}"></script>
{{-- <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
<script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.js') !!}"></script> --}}
{{-- <script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
<script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script> --}}

{{-- <!-- Custom and plugin javascript -->
<script src="{!! asset('js/inspinia.js') !!}"></script>
<script src="{!! asset('js/plugins/pace/pace.min.jsjs/plugins/pace/pace.min.js') !!}"></script> --}}

{{-- <!-- jQuery UI  -->
<script src="{!! asset('js/plugins/jquery-ui/jquery-ui.min.js') !!}"></script> --}}

<!-- Full Calendar -->
<script src="{!! asset('js/plugins/fullcalendar/fullcalendar.min.js') !!}"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function() {



/* initialize the calendar
-----------------------------------------------------------------*/
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();

$('#calendar').fullCalendar({
header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
},
editable: true,
droppable: true, // this allows things to be dropped onto the calendar
drop: function() {
    // is the "remove after drop" checkbox checked?
    if ($('#drop-remove').is(':checked')) {
        // if so, remove the element from the "Draggable Events" list
        $(this).remove();
    }
},
events: addLink(@json($citas))
});


});

function addLink(citas) {
    console.log(citas)
    let citass = citas.map( cita => {

        cita.url = `/citas/${cita.id}/edit`
        return cita;
    }
    )
    return citass;
}

</script>

@endsection


@section('content')
<div class="row" >
    <div class="ml-5 mb-2">
        <a href="{{route('citas.create')}}" type="button" class="btn btn-clock btn-primary"> Agendar Cita </a>
    </div>
    <div class="col-lg-12">
        <div class="ibox-content d-flex justify-content-center">
            <div class="col-lg-8" id="calendar"></div>
        </div>
    </div>

</div>


@endsection
