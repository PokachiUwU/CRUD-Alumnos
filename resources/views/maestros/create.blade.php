@extends('layouts.app')
@section('content')
<h2>Agregar maestro</h2>
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
    <form action="/maestros" method="POST">
    @csrf
    <div class="form-group">
        <label for="id">ID</label>
        <input type="number" class="form-control" name="id">
    </div>
    <div class="form-group">
        <label for="matricula">Matricula</label>
        <input type="number" class="form-control" name="matricula">
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="form-group">
        <label for="especialidad">Especialidad</label>
        <input type="text" class="form-control" name="especialidad">
    <div class="form-group">
        <label for="sexo">Sexo</label><br>
        Hombre <input type="radio" class="radio" name="sexo" value="hombre"><br>
        Mujer <input type="radio" class="radio" name="sexo" value="mujer">
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
    <button type="reset" class="btn btn-secondary">Cancelar</button>
    <a class="btn btn-warning" href="/maestros" role="button">Volver</a>
    </form>
    </div>
</div>
@endsection