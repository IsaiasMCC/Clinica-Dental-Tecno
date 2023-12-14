@extends('layouts.myCustonLayout')

@section('title', 'Roles')

@section('content_header', 'Agregar Usuario')

@section('style')

@endsection

@section('script')

@endsection

@section('content')
<div class="row">

    <div class="col-lg-12">
       <div class="ibox">
        <form method="POST" action="{{ route('usuarios.store') }}">
            @csrf
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" id="name" aria-describedby="nombre" name="name">
            </div>
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" aria-describedby="correo" name="email">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" aria-describedby="contrasena" name="password">
            </div>
            <div class="form-group">
                <label for="selectRol"> Rol </label>
                <select name="rol" id="selectRol" class="custom-select">
                    <option value="" selected> Seleccion un opcion </option>
                    @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}"> {{ $rol->rol }} </option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('usuarios.index') }}" type="button"  class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </form>
       </div>
    </div>


</div>

</div>

@endsection
