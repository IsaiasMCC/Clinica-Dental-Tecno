@extends('layouts.myCustonLayout')

@section('title', 'Cita')

@section('content_header', 'Agregar Cita')

@section('style')

@endsection

@section('script')

@endsection

@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="ibox">
            <form method="POST" action="{{ route('citas.store') }}">
                @csrf
                <div class="d-flex">
                    <div class="form-group col-5">
                        <label for="date">Fecha</label>
                        <input type="date" class="form-control" id="date" aria-describedby="fecha" name="date">
                    </div>
                    <div class="form-group col-5">
                        <label for="time">Hora</label>
                        <input type="time" class="form-control" id="time" aria-describedby="hora" name="time">
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group col-10">
                        <label for="description">Descripción</label>
                        <textarea type="" class="form-control" id="description" name="description">
                        </textarea>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="form-group col-5">
                        <label for="paciente"> Paciente </label>
                        <select name="paciente" id="paciente" class="custom-select">
                            <option value="" selected> Seleccion un opcion </option>
                            @foreach ($pacientes as $paciente)
                            <option value="{{ $paciente->id }}"> {{ $paciente->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-5">
                        <label for="odontologo"> Odontologo </label>
                        <select name="odontologo" id="odontologo" class="custom-select">
                            <option value="" selected> Seleccion un opcion </option>
                            @foreach ($odontologos as $odontologo)
                            <option value="{{ $odontologo->id }}"> {{ $odontologo->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mx-3 mt-3">
                    <a href="{{ route('citas.index') }}" type="button" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Agendar Cita</button>
                </div>
            </form>
        </div>
    </div>


</div>

</div>

@endsection
