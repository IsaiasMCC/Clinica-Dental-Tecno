@extends('layouts.myCustonLayout')

@section('title', 'Roles')

@section('content_header', 'Editar Rol')

@section('style')

@endsection

@section('script')

@endsection


@section('content')
<div class="row">

    <div class="col-lg-12">
        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre Rol</label>
                <input type="text" class="form-control" id="rol" aria-describedby="rol" name="rol"
                    value="{{ $role->rol }}">
            </div>

            <a href="{{ route('roles.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>


</div>


@endsection
