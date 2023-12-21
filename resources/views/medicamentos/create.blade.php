@extends('layouts.myCustonLayout')

@section('title', 'Medicamentos')

@section('content_header', 'Agregar Medicamento')

@section('style')

@endsection

@section('script')

@endsection


@section('content')
<div class="row">

    <div class="col-lg-12">
        <form method="POST" action="{{ route('medicamentos.store') }}">
            @csrf
            <div class="form-group">
              <label for="name">Nombre Medicamento</label>
              <input type="text" class="form-control" id="name" aria-describedby="nombre" name="name">
            </div>
            <div class="form-group">
              <label for="price">Precio Medicamento</label>
              <input type="number" class="form-control" id="price" aria-describedby="precio" name="price">
            </div>

            <a href="{{ route('medicamentos.index') }}" type="button"  class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
    </div>


</div>

</div>

@endsection
