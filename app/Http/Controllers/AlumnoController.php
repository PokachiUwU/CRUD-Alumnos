<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;

class AlumnoController extends Controller
{
    
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('search'));
            $alumnos = Alumno::where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id', 'asc')
            ->paginate(1);
            return view('alumnos.index',['alumnos'=>$alumnos,'search'=>$query]);
        }
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        request()->validate
        ([
            'matricula'=>'required|unique:alumnos',
            'nombre'=>'required',
            'carrera'=>'required',
            'semestre'=>'required',
            'sexo'=>'required'
        ]);

        $alumno = new Alumno();
        $alumno->matricula = request('matricula');
        $alumno->nombre = request('nombre');
        $alumno->carrera = request('carrera');
        $alumno->semestre = request('semestre');
        $alumno->sexo = request('sexo');
        $alumno->save();
        return redirect('/alumnos')->with('guardado','Se agrego con exito un alumno');
    }

    public function show($id)
    {
        return view('alumnos.show',['alumno'=>Alumno::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('alumnos.edit',['alumno'=>Alumno::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        request()->validate
        ([
            'matricula'=>'required',
            'nombre'=>'required',
            'carrera'=>'required',
            'semestre'=>'required',
            'sexo'=>'required'
        ]);
        $alumno = Alumno::findOrFail($id);
        $alumno->matricula = $request->get('matricula');
        $alumno->nombre = $request->get('nombre');
        $alumno->carrera = $request->get('carrera');
        $alumno->semestre = $request->get('semestre');
        $alumno->sexo = $request->get('sexo');
        $alumno->update();
        return redirect('/alumnos')->with('editado','Se modifico con exito un alumno');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno -> delete();
        return redirect('/alumnos')->with('eliminado','Se elimino con exito un alumno');
    }

    public function confirm($id)
    {
        $alumno=Alumno::findOrFail($id);
        return view('alumnos.confirm',compact('alumno'));
    }
}
