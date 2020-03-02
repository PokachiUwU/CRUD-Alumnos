@extends('layouts.app')
@section('content')
    <form action="{{route('alumnos.destroy',$alumno->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Confirmacion de eliminacion</h4>
        <p class="card-text">
        ¿Desea eliminar este usuario?
        </p>
        <button type="submit" class="btn btn-danger">Aceptar</button>
        <a href="{{route('alumnos.index')}}">Regresar</a>
    </div>
    </div>
    </form>
@endsection