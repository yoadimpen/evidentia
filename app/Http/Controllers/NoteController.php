<?php

namespace App\Http\Controllers;

use App\Rules\MaxCharacters;
use App\Rules\MinCharacters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;

class NoteController extends Controller
{

    // Listar las notas

    public function list()
    {
        $notes = Auth::user()->notes;
        return view('note.list',['notes' => $notes]);
    }

    // Crear una nota

    public function create()
    {
        return view('note.createandedit');
    }

    public function new(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => ['required',new MinCharacters(10),new MaxCharacters(20000)],
        ]);

        $user = Auth::user();
        $note = Note::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $user->id,
        ]);
        $note->save();

        return redirect()->route('note.list',\Instantiation::instance())->with('success', 'Nota creada con éxito.');

    }

    // Editar una nota

    public function edit($instance, $id)
    {
        $note = Note::find($id);
        return view('note.createandedit',['note' => $note, 'edit' => true]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => ['required',new MinCharacters(10),new MaxCharacters(20000)],
        ]);

        //Esta línea en verdad no hace falta
        $user = Auth::user();

        $note = Note::find($request->_id);
        $note->title = $request->input('title');
        $note->description = $request->input('description');

        $note->save();

        return redirect()->route('note.list',\Instantiation::instance())->with('success', 'Nota actualizada con éxito.');

    }

    // Borrar una nota
    public function remove(Request $request)
    {
        $id = $request->_id;
        $note = Note::find($id);

        $note->delete();

        return redirect()->route('note.list',\Instantiation::instance())->with('success', 'Nota eliminada con éxito.');

    }
}
