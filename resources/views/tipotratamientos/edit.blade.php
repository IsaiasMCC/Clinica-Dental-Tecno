@extends('layouts.myCustonLayout')

@section('title', 'Tipo Tratamiento')

@section('content_header', 'Editar tipo tratamiento')

@section('style')

@endsection

@section('script')

@endsection


@section('content')
<div class="row">

    <div class="col-lg-12">
        <form method="POST" action="{{ route('tipotratamientos.update', $tipotratamiento->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ $tipotratamiento->nombre }}">
            </div>
            <div class="form-group">
              <label for="cost">Costo</label>
              <input type="text" class="form-control" id="cost" aria-describedby="cost" name="cost" value="{{ $tipotratamiento->costo }}">
            </div>

            <a href="{{ route('tipotratamientos.index') }}" type="button"  class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
    </div>


</div>

</div>

@endsection
