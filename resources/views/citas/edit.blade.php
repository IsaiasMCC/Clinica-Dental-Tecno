@extends('layouts.myCustonLayout')

@section('title', 'Cita')

@section('content_header', 'Editar Cita')

@section('style')

@endsection

@section('script')

@endsection

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="ibox">
            <form method="POST" action="{{ route('citas.update', $cita->id) }}">
                @csrf
                @method('PATCH')
                <div class="d-flex">
                    <div class="form-group col-5">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" id="date" aria-describedby="fecha" name="date" value="{{ $cita->fecha }}">
                    </div>
                    <div class="form-group col-5">
                        <label for="time">Hora</label>
                        <input type="time" class="form-control" id="time" aria-describedby="hora" name="time" value="{{ $cita->hora }}">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group col-10">
                        <label for="description">Descripción</label>
                        <textarea class="form-control pl-1" id="description" name="description">
                            {{ $cita->motivo }}
                        </textarea>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group col-5">
                        <label for="paciente">Paciente</label>
                        <input type="paciente" class="form-control" id="paciente" aria-describedby="hora" type="text"
                            name="paciente" value="{{ $paciente->name }}" disabled>
                    </div>
                    <div class="form-group col-5">
                        <label for="odontologo"> Odontologo </label>
                        <select name="odontologo" id="odontologo" class="custom-select">
                            <option value="" selected> Seleccion un opcion </option>
                            @foreach ($odontologos as $odontologo)
                            @if ($odontologo->id == $cita->odontologo)
                            <option value="{{$odontologo->id}}" selected> {{ $odontologo->name }} </option>
                            @else
                            <option value="{{ $odontologo->id }}"> {{ $odontologo->name }} </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mx-3 mt-3">
                    <a href="{{ route('citas.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Cita</button>
                </div>
            </form>
        </div>
    </div>


</div>

</div>

@endsection
