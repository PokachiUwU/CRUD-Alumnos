<?php

namespace App\Http\Controllers;

use App\Maestro;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('search'));
            $maestros = Maestro::where('nombre','LIKE','%'.$query.'%')
            ->orderBy('id','asc')
            ->paginate(1);
            return view('maestros.index',['maestros'=>$maestros, 'search'=>$query]);
        }
    }

    public function create()
    {
        return view('maestros.create');
    }

    public function store(Request $request)
    {
        request()->validate
        ([
            'id'=>'required|unique:maestros',
            'matricula'=>'required|unique:maestros',
            'nombre'=>'required',
            'especialidad'=>'required',
            'sexo'=>'required'
        ]);

        $maestro = new Maestro();
        $maestro->id = request('id');
        $maestro->matricula = request('matricula');
        $maestro->nombre = request('nombre');
        $maestro->especialidad = request('especialidad');
        $maestro->sexo = request('sexo');
        $maestro->save();
        return redirect('/alumnos')->with('guardado','se agrego con exito un maestro');
    }

    public function show(Maestro $id)
    {
        return view('maestros.show',['maestro'=>Maestro::findOrFail($id)]);
    }

    public function edit(Maestro $maestro)
    {
        return view('maestros.edit',['maestro'=>Maestro::findOrFail($id)]);
    }

    public function update(Request $request, Maestro $id)
    {
        request()->validate
        ([
            'id'=>'required',
            'matricula'=>'required',
            'nombre'=>'required',
            'especiaidad'=>'required',
            'sexo'=>'required'
        ]);

        $maestro = Maestro::findOrFail($id);
        $maestro->id = $request->get('id');
        $maestro->matricula = $request->get('matricula');
        $maestro->nombre = $request->get('nombre');
        $maestro->especialidad = $request->get('especialidad');
        $maestro->sexo = $request->get('sexo');
        $maestro->update();
        return redirect('/maestros')->with('editado','se edito con exito un maestro');
    }

    public function destroy(Maestro $id)
    {
        $maestro = Maestro::findOrFail($id);
        $maestro->delete();
        return redirect('/maestros')->with('eliminado','Se elimino con exito un maestro');
    }

    public function confirm($id)
    {
        $maestro = Maestro::findOrFail($id);
        return view('maestros.confirm',compact('maestro'));
    }
}
