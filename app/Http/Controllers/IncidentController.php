<?php

namespace App\Http\Controllers;

use App\Rules\MaxCharacters;
use App\Rules\MinCharacters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Incident;

class IncidentController extends Controller
{
    // Listar las incidencias

    public function list()
    {
        $incidents = Auth::user()->incidents;
        return view('incident.list',['incidents' => $incidents]);
    }

    // Crear una incidencia

    public function create()
    {
        return view('incident.createandedit');
    }

    public function new(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => ['required',new MinCharacters(10),new MaxCharacters(20000)],
            'date' => 'required|',
            'solution' => ['required',new MinCharacters(10),new MaxCharacters(20000)],
        ]);

        $user = Auth::user();
        $incident = Incident::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'solution' => $request->input('solution'),
            'user_id' => $user->id,
        ]);
        $incident->save();

        return redirect()->route('incident.list',\Instantiation::instance())->with('success', 'Incidencia creada con éxito.');

    }

    // Editar una incidencia

    public function edit($instance, $id)
    {
        $incident = Incident::find($id);
        return view('incident.createandedit',['incident' => $incident, 'edit' => true]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => ['required',new MinCharacters(10),new MaxCharacters(20000)],
            'date' => 'required|',
            'solution' => ['required',new MinCharacters(10),new MaxCharacters(20000)],
        ]);

        $user = Auth::user();

        $incident = Incident::find($request->_id);
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        $incident->date = $request->input('date');
        $incident->solution = $request->input('solution');

        $incident->save();

        return redirect()->route('incident.list',\Instantiation::instance())->with('success', 'Incidencia actualizada con éxito.');

    }

    // Borrar una incidencia
    public function remove(Request $request)
    {
        $id = $request->_id;
        $incident = Incident::find($id);

        $incident->delete();

        return redirect()->route('incident.list',\Instantiation::instance())->with('success', 'Incidencia eliminada con éxito.');

    }
}
