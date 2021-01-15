<?php

namespace App\Http\Controllers;

use App\DefaultList;
use App\MeetingPlanning;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingPlanningSecretaryController extends Controller
{
  public function __construct()
 {
     $this->middleware('auth');
     $this->middleware('checkroles:SECRETARY');
 }

 public function list()
 {
     $instance = \Instantiation::instance();

     $meetingplannings = Auth::user()->secretary->comittee->meetingplannings()->get();

     return view('meetingplanning.list',
         ['instance' => $instance, 'meetingplannings' => $meetingplannings]);
 }

 public function create()
 {
     $instance = \Instantiation::instance();

     $users = User::orderBy('surname')->get();
     $defaultlists = Auth::user()->secretary->default_lists;

     return view('meetingplanning.createandedit',
         ['instance' => $instance, 'users' => $users, 'defaultlists' => $defaultlists, 'route' => route('secretary.meetingplanning.new',$instance)]);
 }

 public function new(Request $request)
 {

     $instance = \Instantiation::instance();

     $validatedData = $request->validate([
         'title' => 'required|min:5|max:255',
         'type' => 'required|numeric|min:1|max:2',
         'place' => 'required|min:5|max:255',
         'date' => 'required|date_format:Y-m-d|after:today',
         'time' => 'required',
         'users' => 'required|array|min:1'
     ]);

     $meetingplanning = MeetingPlanning::create([
         'title' => $request->input('title'),
         'type' => $request->input('type'),
         'place' => $request->input('place'),
         'datetime' => $request->input('date')." ".$request->input('time')
     ]);

     $meetingplanning->comittee()->associate(Auth::user()->secretary->comittee);

     $meetingplanning->save();

     // Asociamos los usuarios a la reunión
     $users_ids = $request->input('users',[]);

     foreach($users_ids as $user_id)
     {

         $user = User::find($user_id);
         $meetingplanning->users()->attach($user);

     }

     return redirect()->route('secretary.meetingplanning.list',$instance)->with('success', 'Planificación de Reunión creada con éxito.');

 }

 public function defaultlist($instance,$id)
 {
     return DefaultList::find($id)->users;
 }

 public function save(Request $request)
 {

     $instance = \Instantiation::instance();

     $validatedData = $request->validate([
         'title' => 'required|min:5|max:255',
         'type' => 'required|numeric|min:1|max:2',
         'place' => 'required|min:5|max:255',
         'date' => 'required',
         'time' => 'required',
         'users' => 'required|array|min:1'
     ]);

     $meetingplanning = MeetingPlanning::find($request->_id);
     $meetingplanning->title = $request->input('title');
     $meetingplanning->type = $request->input('type');
     $meetingplanning->place = $request->input('place');
     $meetingplanning->datetime = $request->input('date')." ".$request->input('time');

     $meetingplanning->save();

     // Asociamos los usuarios a la reunión
     $users_ids = $request->input('users',[]);

     // eliminamos usuarios antiguos de la reunión
     foreach($meetingplanning->users as $user)
     {
         $meetingplanning->users()->detach($user);
     }

     // agregamos los usuarios nuevos de la reunión
     foreach($users_ids as $user_id)
     {
         $user = User::find($user_id);
         $meetingplanning->users()->attach($user);
     }

     return redirect()->route('secretary.meetingplanning.list',$instance)->with('success', 'Planificación de Reunión editada con éxito.');

 }


}
