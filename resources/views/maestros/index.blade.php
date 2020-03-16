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
    <h2>Maestros registrados<a href="maestros/create"><button type="button" class="btn btn-success float-right">Registrar maestros</button></a></h2>
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
        <th scope="col">Especialidad</th>
        <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($maestros as $maestro)
        <tr>
        <th scope="row">{{$maestro->id}}</th>
        <td>{{$maestro->matricula}}</td>
        <td>{{$maestro->nombre}}</td>
        <td>{{$maestro->especialidad}}</td>
        <td>
        <a href="{{route('maestros.show',$maestro->id)}}"><button type="button" class="btn btn-info">Ver</button></a>
        <a href="{{route('maestros.edit',$maestro->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>
        <a href="{{route('maestros.confirm',$maestro->id)}}"><button type="submit" class="btn btn-danger">Eliminar</button></a>
        </td>
        </tr>
    @endforeach  
    </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            {{$maestros->links()}}
        </div>
    </div>
@endsection