@extends('layouts.myCustonLayout')

@section('title', 'Tratamientos')

@section('content_header', 'Editar Tratamiento')

@section('style')

@endsection

@section('script')

@endsection

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="ibox">
            <form method="POST" action="{{ route('tratamientos.update', $tratamiento->id) }}">
                @csrf
                @method('PATCH')
                <input type="number" hidden value="{{$tratamiento->id}}" name="id">
                <div class="d-flex">
                    <div class="form-group col-5">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" id="date" aria-describedby="fecha" name="date" value="{{ $tratamiento->fecha }}">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group col-10">
                        <label for="description">Descripción</label>
                        <textarea type="" class="form-control" id="description" name="description">
                            {{ $tratamiento->descripcion }}
                        </textarea>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group col-5">
                        <label for="tipotratamiento"> Tipo de tratamiento </label>
                        <select name="tipotratamiento" id="tipotratamiento" class="custom-select">
                            <option value="{{ $tratamiento->tipo_tratamiento_id }}" selected disabled> {{ $tratamiento->tipo_tratamiento->nombre }} </option>
                            {{-- @foreach ($tipotratamientos as $tipotratamiento)
                            <option value="{{ $tipotratamiento->id }}"> {{ $tipotratamiento->nombre }} | Bs. {{
                                $tipotratamiento->costo }} </option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="form-group col-5">
                        <label for="cita"> Cita de tratamiento </label>
                        <select name="cita" id="cita" class="custom-select">
                            <option value="{{ $tratamiento->cita_id }}" selected> {{ $tratamiento->cita->fecha }} | {{ $tratamiento->cita->user_paciente->name }} | {{
                                $tratamiento->cita->user_odontologo->name }} | {{ $tratamiento->cita->motivo }} </option>
                            {{-- @foreach ($citas as $cita)
                            <option value="{{ $cita->id }}"> {{ $cita->fecha }} | {{ $cita->user_paciente->name }} | {{
                                $cita->user_odontologo->name }} | {{ $cita->motivo }} </option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
                <div class="form-group col-10">
                    <label for="estado"> Estado de tratamiento </label>
                    <select name="estado" id="estado" class="custom-select">
                        <option value="0"> En tratamiento  </option>
                        <option value="1"> Finalizado  </option>

                    </select>
                </div>


                <div class="mx-3 mt-3">
                    <a href="{{ route('tratamientos.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Tratamiento</button>
                </div>
            </form>
        </div>
        <hr>
        {{-- <div class="ibox ml-3">
            <h3> Recetas</h3>
        </div>
        <div class="ibox">
            <div class="d-flex">
                <div class="form-group col-5">
                    <label for="medicamento"> Medicamentos </label>
                    <select name="medicamento" id="medicamento" class="custom-select">
                        <option value="" selected disabled> Seleccion un opcion </option>

                    </select>
                </div>
                <div class="form-group col-5">
                    <label for="count">Cantidad</label>
                    <input type="number" class="form-control" id="count" aria-describedby="count" name="count">
                </div>
                <div class="col">
                    <label for="">.....</label>

                    <button class="btn btn-primary" id="btn-add-medicamento" onclick="agregarMedicamento()"> Agregar
                        medicamento </button>
                </div>
            </div>
        </div> --}}
        <div class="ibox ml-3 col-10">
            <!-- Mostrar la lista de productos -->
            <h2 class="text-center">Lista Actual de Medicamentos </h2>
            <table border="1" class="table table-striped">
                <thead class="table-striped">
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="listamedicamentos">
                    {{-- @php
                        dd($tratamiento->recetas[0]->detalle_recetas);
                    @endphp --}}
                    @foreach($tratamiento->recetas[0]->detalle_recetas as $producto)

                    <tr>
                        <td> {{ $producto['id'] }} </td>
                        <td> {{ $producto->medicamento->nombre }} </td>
                        <td> {{ $producto->medicamento->cantidad }} </td>
                        <td> {{ $producto['cantidad'] }} </td>
                        <td> {{ $producto['subtotal'] }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>




    {{-- SCRIPTS PARA AGREGAR MEDICAMENTOS --}}
    <script>
        async function agregarMedicamento() {
            const route_add_medicamento = '{{ route('tratamientos.agregarMedicamento') }}';
            const productoId = document.getElementById('medicamento').value;
            const cantidad = document.getElementById('count').value;
            console.log('cantidad')
            try {
                const response = await fetch(route_add_medicamento, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ medicamento: productoId, count: cantidad })
                });

                if (response.ok) {
                    const productos = await response.json();
                    actualizarLista(productos);
                } else {
                    console.error('Error al agregar el producto');
                }
            } catch (error) {
                console.error('Error de red:', error);
            }
        }

        function actualizarLista(productos) {
            const listaProductos = document.getElementById('listamedicamentos');
            listaProductos.innerHTML = '';
            let products = productos.productos;

             // Iterar sobre las claves y valores de la sesión
             for (const key in products) {
                const producto = products[key];
                const tr = document.createElement('tr');
                console.log(producto)
                // Iterar sobre las propiedades del producto
                for (const prop in producto) {
                    const td = document.createElement('td');
                    td.textContent = producto[prop];
                    tr.appendChild(td);
                }
                var boton = document.createElement('button');
                boton.innerHTML = 'Eliminar';
                tr.appendChild(boton);

                listaProductos.appendChild(tr);
            }
        }
    </script>
</div>


@endsection
