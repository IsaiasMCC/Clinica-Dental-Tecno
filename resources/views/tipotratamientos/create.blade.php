@extends('layouts.myCustonLayout')

@section('title', 'Tipo Tratamiento')

@section('content_header', 'Agregar tipo tratamiento')

@section('style')

@endsection

@section('script')

@endsection


@section('content')
<div class="row">

    <div class="col-lg-12">
        <form method="POST" action="{{ route('tipotratamientos.store') }}">
            @csrf
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
            </div>
            <div class="form-group">
              <label for="cost">Costo</label>
              <input type="text" class="form-control" id="cost" aria-describedby="cost" name="cost">
            </div>

            <a href="{{ route('tipotratamientos.index') }}" type="button"  class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
    </div>


</div>

</div>

@endsection
