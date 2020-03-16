@extends('layouts.app')
@section('content')
@if(session('eliminado'))
<div class="alert alert-danger">
<strong>{{session('eliminado')}}</strong>
</div>
@endif
@if(session('editado'))
<div class="alert alert-warning">
<strong>{{session('editado')}}</strong>
</div>
@endif
@if(session('guardado'))
<div class="alert alert-success">
<strong>{{session('guardado')}}</strong>
</div>
@endif
    <h2>Alumnos registrados<a href="alumnos/create"><button type="button" class="btn btn-success float-right">Registrar alumnos</button></a></h2>
    <h6>
        @if($search)
            <div class="alert alert-primary" role="alert">
                Resultados de busqueda '{{$search}}':
            </div>
        @endif
    </h6>
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Matricula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Carrera</th>
        <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
        <th scope="row">{{$alumno->id}}</th>
        <td>{{$alumno->matricula}}</td>
        <td>{{$alumno->nombre}}</td>
        <td>{{$alumno->carrera}}</td>
        <td>
        <a href="{{route('alumnos.show',$alumno->id)}}"><button type="button" class="btn btn-info">Ver</button></a>
        <a href="{{route('alumnos.edit',$alumno->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="{{route('alumnos.confirm',$alumno->id)}}"><button type="submit" class="btn btn-danger">Eliminar</button></a>
        </td>
        </tr>
    @endforeach  
    </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            {{$alumnos->links()}}
        </div>
    </div>
@endsection