@extends('layouts.app')
@section('content')
<h2>Perfil de alumno</h2>
<div class="jumbotron">
  <h1 class="display-4">{{$maestro->nombre}}</h1>
  <p class="lead">Matricula: {{$maestro->matricula}} &nbsp;&nbsp;&nbsp;&nbsp;Especialidad: {{$maestro->especialidad}}</p>
  <hr class="my-4">
  <p>Sexo: {{$maestro->sexo}}</p>
  <a class="btn btn-primary btn-lg" href="/maestros" role="button">Volver</a>
</div>
@endsection