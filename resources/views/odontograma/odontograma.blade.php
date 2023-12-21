@extends('layouts.myCustonLayout')

@section('title', 'Odontograma')

@section('content_header', 'Odontograma paciente '.$usuario->name)



@section('content')
<style>
    /* Estilos para los dientes */
    .diente {
        width: 40px;
        height: 60px;
        border: 1px solid #000;
        margin: 1px;
        display: inline-block;
        text-align: center;
        cursor: pointer;
    }

    /* Estilos para los cuadrantes */
    .cuadrante {
        border: 1px solid #ccc;
        margin: 5px;
        display: inline-block;
    }

    .linea-vertical,
    .linea-horizontal {
        border: 1px solid #ccc;
        margin: 5px;
    }

    .diente-seleccionado {
        background-color: green;
        color: white;
        /* Cambia el color del texto si es necesario para que sea legible en verde */
    }
</style>
<div class="container">
    @csrf
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Cuadrante 1
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($dientes as $diente)
                                @if($diente->cuadrante==1)
                                <div class="diente" id="diente-{{$diente->numero_diente}}" data-diente="{{$diente->numero_diente}}">
                                    <p>{{$diente->numero_diente}}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Cuadrante 2
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($dientes as $diente)
                                @if($diente->cuadrante==2)
                                <div class="diente" id="diente-{{$diente->numero_diente}}" data-diente="{{$diente->numero_diente}}">
                                    <p>{{$diente->numero_diente}}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Cuadrante 3
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($dientes as $diente)
                                @if($diente->cuadrante==3)
                                <div class="diente" id="diente-{{$diente->numero_diente}}" data-diente="{{$diente->numero_diente}}">
                                    <p>{{$diente->numero_diente}}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Cuadrante 4
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach ($dientes as $diente)
                                @if($diente->cuadrante==4)
                                <div class="diente" id="diente-{{$diente->numero_diente}}" data-diente="{{$diente->numero_diente}}">
                                    <p>{{$diente->numero_diente}}</p>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="miDiv" class="table-responsive">
                                    <table id="tablaDatos" class="table table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Diente</th>
                                                <th scope="col">Tratamiento</th>
                                                <th scope="col">Descripcion</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <tfoot>
                                        <button class="btn btn-warning" id="guardar_cambio" onclick="registrarOdontograma()">Registrar
                                            Odontograma</button>
                                    </tfoot>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="radio" name="radio_group" name="opcion" id="opcion1" value="0" checked>
                                        <label class="form-check-label" for="opcion1">(Rojo) Trat. por realizar</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="radio_group" name="opcion" id="opcion2" value="1">
                                        <label class="form-check-label" for="opcion2">(Azul) Trat. realizado</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="prodpp">
                                        <div class="dropdown profile-element">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <span class="block m-t-xs font-bold">Elegir Tratamiento 🦷 </span>
                                            </a>
                                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                                @foreach( $tratamientos_realizados as $tratamiento_realizado)
                                                <li><a class="dropdown-item" onclick="seleccionar('{{$tratamiento_realizado->id}}')"><img src="{{ asset('img/azul/'.$tratamiento_realizado->nombre.'.png')}}" alt="" style="width: 30px; height: 30px"> {{ $tratamiento_realizado->nombre }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="prod">
                                        <div class="dropdown profile-element">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                <span class="block m-t-xs font-bold">Elegir Tratamiento 🦷 </span>
                                            </a>
                                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                                @foreach( $tratamientos_por_realizar as $tratamiento_por_realizar)
                                                <li><a class="dropdown-item" onclick="seleccionar('{{$tratamiento_por_realizar->id}}')"><img src="{{ asset('img/rojo/'.$tratamiento_por_realizar->nombre.'.png')}}" alt="" style="width: 30px; height: 30px"> {{ $tratamiento_por_realizar->nombre }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="p-2 bd-highlight" id="seleccionado"></div>
                                    </div>
                                    <div class="d-flex flex-row-reverse bd-highlight">
                                        <div class="p-2 bd-highlight"><button class="btn btn-primary" type="button" onclick="agregar()">Agregar</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">Lista de Dientes</li>
                            @foreach ($dientes as $diente)
                            <li class="list-group-item">{{$diente->numero_diente}} - {{$diente->nombre_diente}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Código JavaScript para manejar la selección de dientes y cuadrantes -->
<script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
<script>
    let data_seleccionado;
    let diente_seleccionado;
    let odontogramas = [];
    let ruta_guardar_odontograma = "{{ route('odontogramas.store') }}";
    let ruta_index = "{{ route('odontogramas.index_view') }}";

    function seleccionar(id) {
        let ruta_optener_odontograma_tratamiento = "{{ route('odontograma.getTratamiento','value') }}";
        ruta_optener_odontograma_tratamiento = ruta_optener_odontograma_tratamiento.replace('value', id);
        fetch(ruta_optener_odontograma_tratamiento)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                data_seleccionado = data;
                if (data.estado == 'realizado') {
                    var imageUrl = "{{ asset('img/azul/') }}" + '/' + data.nombre + '.png';
                } else {

                    var imageUrl = "{{ asset('img/rojo/') }}" + '/' + data.nombre + '.png';
                }

                // Crea el elemento de imagen y establece sus atributos
                var imgElement = document.createElement('img');
                imgElement.src = imageUrl;
                imgElement.alt = '';
                imgElement.style.width = '50px';
                imgElement.style.height = '50px';

                // Obtiene el elemento div por su ID y agrega la imagen como hijo
                var divSeleccionado = document.getElementById('seleccionado');
                divSeleccionado.innerHTML = '';
                divSeleccionado.appendChild(imgElement);
            })
            .catch(error => console.error(error));
    }
    $(document).ready(function() {
        const radio1 = document.getElementById('opcion1');
        const radio2 = document.getElementById('opcion2');
        $("#prodpp").hide();
        radio1.addEventListener('change', () => {
            if (radio1.checked) {
                $("#prodpp").hide();
                $("#prod").show();
            }
        });
        radio2.addEventListener('change', () => {
            if (radio2.checked) {
                $("#prodpp").show();
                $("#prod").hide();
            }
        });
        // Manejar clic en un diente
        $('.diente').on('click', function() {
            var dienteId = $(this).data('diente');
            $('.diente').removeClass('diente-seleccionado');
            $(this).addClass('diente-seleccionado');
            diente_seleccionado = dienteId;
        });

        // Manejar clic en un cuadrante
        $('.cuadrante').on('click', function() {
            var cuadranteId = $(this).data('cuadrante');
            diente_seleccionado = dienteId;
            // alert('Cuadrante seleccionado: ' + cuadranteId);
        });
    });

    function agregar() {
        console.log(data_seleccionado, diente_seleccionado);
        let obOdontograma = {
            numero_diente: diente_seleccionado,
            odontograma_tratamiento_id: data_seleccionado.id,
            odontograma_tratamiento_nombre: data_seleccionado.nombre,
            odontograma_tratamiento_estado: data_seleccionado.estado
        }
        odontogramas.push(obOdontograma);
        llenarTabla();
    }

    function llenarTabla() {
        let tabla = $("#tablaDatos tbody");
        tabla.empty(); // Limpiar tabla antes de llenarla
        odontogramas.forEach(function(odontograma) {
            if (odontograma.odontograma_tratamiento_estado == 'realizado') {
                tabla.append("<tr><td>" + odontograma.numero_diente + "</td><td>" + "<img src='" + "{{ asset('img/azul/') }}/" + odontograma.odontograma_tratamiento_nombre + '.png' + "' style='width: 30px; height: 30px'>" + "</td><td>" +
                    odontograma.odontograma_tratamiento_nombre + "</td></tr>");
            } else {
                tabla.append("<tr><td>" + odontograma.numero_diente + "</td><td>" + "<img src='" + "{{ asset('img/rojo/') }}/" + odontograma.odontograma_tratamiento_nombre + '.png' + "' style='width: 30px; height: 30px'>" + "</td><td>" +
                    odontograma.odontograma_tratamiento_nombre + "</td></tr>");
            }
        });
    }

    function registrarOdontograma() {
        fetch(ruta_guardar_odontograma, {
                method: "POST",
                body: JSON.stringify({
                    usuario_id: '{{ $usuario->id }}',
                    odontogramas: odontogramas,
                }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-Token": '{{ csrf_token() }}',
                },
            })
            .then((response) => {
                return response.json();

            })
            .then((data) => {
                if (data.success) {
                    window.location.href = ruta_index;
                } else {
                    console.log('algo salio mal');
                }
            })
            .catch((error) => console.error(error));
    }
</script>
@endsection
