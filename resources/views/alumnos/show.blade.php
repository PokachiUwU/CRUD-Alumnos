@extends('layouts.app')

@section('content')
<h2>Perfil de alumno</h2>
<div class="jumbotron">
  <h1 class="display-4">{{$alumno->nombre}}</h1>
  <p class="lead">Matricula: {{$alumno->matricula}} &nbsp;&nbsp;&nbsp;&nbsp;Carrera: {{$alumno->carrera}}</p>
  <hr class="my-4">
  <p>Semestre: {{$alumno->semestre}} &nbsp;&nbsp;&nbsp;&nbsp;Sexo: {{$alumno->sexo}}</p>
  <a class="btn btn-primary btn-lg" href="/alumnos" role="button">Volver</a>
</div>
@endsection