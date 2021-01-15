<?php

namespace App\Http\Controllers;

use App\Rules\MaxCharacters;
use App\Rules\MinCharacters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Valoration;

class ValorationController extends Controller
{
    // Listar las incidencias

    public function list()
    {
        $valorations = Auth::user()->valorations;
        return view('valoration.list',['valorations' => $valorations]);
    }

    // Crear una incidencia

    public function create()
    {
        return view('valoration.createandedit');
    }

    public function new(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => 'required',new MinCharacters(10),new MaxCharacters(20000),
            'date' => 'required|',
            'qualification' =>' required|numeric|between:0,5|max:5',
        ]);

        $user = Auth::user();
        $valoration = Valoration::create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'qualification' => $request->input('qualification'),
        ]);
        $valoration->save();

        return redirect()->route('valoration.list',\Instantiation::instance())->with('success', 'Valoración creada con éxito.');

    }

    // Editar una incidencia

    public function edit($instance, $id)
    {
        $valoration = Valoration::find($id);
        return view('valoration.createandedit',['valoration' => $valoration, 'edit' => true]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'date' => $request->input('date'),
            'description' => $request->input('description'),
            'qualification' => $request->input('qualification')
        ]);

        $user = Auth::user();

        $valoration = Valoration::find($request->_id);
        $valoration->title = $request->input('title');
        $valoration->date = $request->input('date');
        $valoration->description = $request->input('description');
        $valoration->qualification = $request->input('qualification');
        $valoration->save();

        return redirect()->route('valoration.list',\Instantiation::instance())->with('success', 'Valoracion actualizada con éxito.');

    }

    // Borrar una incidencia
    public function remove(Request $request)
    {
        $id = $request->_id;
        $valoration = Valoration::find($id);

        $valoration->delete();

        return redirect()->route('valoration.list',\Instantiation::instance())->with('success', 'Valoracion eliminada con éxito.');

    }
}
