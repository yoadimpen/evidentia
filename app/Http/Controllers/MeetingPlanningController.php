<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingPlanningController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('checkroles:PRESIDENT|COORDINATOR|REGISTER_COORDINATOR|SECRETARY|STUDENT');
  }

  public function list()
  {
      $instance = \Instantiation::instance();

      $meetingplannings = Auth::user()->meetingplannings()->get();

      return view('meetingplanning.mylist',
          ['instance' => $instance, 'meetingplannings' => $meetingplannings]);
  }
}
