@extends('layouts.myCustonLayout')

@section('title', 'Roles')

@section('content_header', 'Editar Usuario')

@section('style')

@endsection

@section('script')

@endsection

@section('content')
<div class="row">

    <div class="col-lg-12">
       <div class="ibox">
        <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" id="name" aria-describedby="nombre" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="text" class="form-control" id="email" aria-describedby="correo" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" aria-describedby="contrasena" name="password">
            </div>
            <div class="form-group">
                <label for="selectRol"> Rol </label>
                <select name="rol" id="selectRol" class="custom-select">
                    @if( count($user->roles) == 0)
                    <option value="" disabled selected> Seleccione una opción </option>
                    @endif
                    @foreach ($roles as $rol)
                    @if (( count($user->roles) > 0 ) && ($user->roles[0]->role->id  == $rol->id) )
                    <option selected value="{{ $rol->id }}"> {{ $rol->rol }} </option>
                    @else
                    <option value="{{ $rol->id }}"> {{ $rol->rol }} </option>
                    @endif
                    @endforeach
                </select>
            </div>

            <a href="{{ route('usuarios.index') }}" type="button"  class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </form>
       </div>
    </div>


</div>

</div>

@endsection
