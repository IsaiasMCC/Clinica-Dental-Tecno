@extends('layouts.myCustonLayout')

@section('title', 'Roles')

@section('content_header', 'Agregar Rol')

@section('style')

@endsection

@section('script')

@endsection


@section('content')
<div class="row">

    <div class="col-lg-12">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Nombre Rol</label>
              <input type="text" class="form-control" id="rol" aria-describedby="rol" name="rol">
            </div>

            <a href="{{ route('roles.index') }}" type="button"  class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
    </div>


</div>

</div>

@endsection
