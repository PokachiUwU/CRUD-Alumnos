@extends('layouts.app')
@section('content')
<h2>Editar maestro</h2>
<div class="row">

    <div class="col-sm-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('maestros.update', $maestro->id)}}" method="POST">
    @method('PATCH')
    @csrf
    </div>
    <div class="form-group">
        <label for="id">ID</label>
        <input type="number" class="form-control" name="id"value="{{$maestro->id}}">
    </div>
    <div class="form-group">
        <label for="matricula">Matricula</label>
        <input type="number" class="form-control" name="matricula" value="{{$maestro->matricula}}">
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$maestro->nombre}}">
    </div>
    <div class="form-group">
        <label for="especialidad">Carrera</label>
        <input type="text" class="form-control" name="especialidad" value="{{$maestro->carrera}}">

    @if($maestro->sexo=="hombre")
    <div class="form-group">
        <label for="sexo">Sexo</label><br>
        Hombre <input type="radio" class="radio" checked name="sexo" value="hombre"><br>
        Mujer <input type="radio" class="radio" name="sexo" value="mujer">
    </div>
    @else
    <div class="form-group">
        <label for="sexo">Sexo</label><br>
        Hombre <input type="radio" class="radio"  name="sexo" value="hombre"><br>
        Mujer <input type="radio" class="radio" checked name="sexo" value="mujer">
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="reset" class="btn btn-secondary">Cancelar</button>
    <a class="btn btn-warning" href="/alumnos" role="button">Volver</a>
    </form>
    </div>
</div>
@endsection