<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\PhonePattern;

class ContactController extends Controller
{
    //Listar los contactos

    public function list(){
        $contacts = Auth::user()->contacts;
        return view('contact.list',['contacts' => $contacts]);
    }

    //Crear contacto

    public function create(){
        return view('contact.createandedit');
    }

    public function new(Request $request){

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|regex:/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/',
            'company' => 'required',
        ]);

        $user = Auth::user();
        $contact = Contact::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
            'user_id' => $user->id,
        ]);
        $contact->save();

        return redirect()->route('contact.list',\Instantiation::instance())->with('success', 'Contacto creado con éxito!');

    }

    //Editar un contacto

    public function edit($instance, $id){
        $contact = Contact::find($id);
        return view('contact.createandedit',['contact' => $contact, 'edit' => true]);
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|regex:/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/',
            'company' => 'required',
        ]);

        $user = Auth::user();
        $contact = Contact::find($request->_id);
        $contact->name = $request->input('name');
        $contact->surname = $request->input('surname');
        $contact->phone = $request->input('phone');
        $contact->company = $request->input('company');

        $contact->save();

        return redirect()->route('contact.list',\Instantiation::instance())->with('success', 'Contacto actualizado con éxito!');
    }

    //Borrar un contacto

    public function remove(Request $request){
        $id = $request->_id;
        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route('contact.list',\Instantiation::instance())->with('success', 'Contacto eliminado con éxito!');
    }
}
