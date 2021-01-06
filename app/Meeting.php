<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $table = "meeting";

    protected $fillable = [
      'id','title','datetime','place','type','hours'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function comittee()
    {
        return $this->belongsTo('App\Comittee');
    }

    public function meetingRequest()
    {
        return $this->belongsTo('App\MeetingRequest');
    }

    public function meetingMinutes()
    {
        return $this->hasMany('App\MeetingMinutes');
    }

    public static function meetings_presidencia() {
        return Meeting::where('comittee_id','=', '1')->count();
    }

    public static function meetings_secretaria() {
        return Meeting::where('comittee_id','=', '2')->count();
    }

    public static function meetings_programa() {
        return Meeting::where('comittee_id','=', '3')->count();
    }

    public static function meetings_igualdad() {
        return Meeting::where('comittee_id','=', '4')->count();
    }

    public static function meetings_sostenibilidad() {
        return Meeting::where('comittee_id','=', '5')->count();
    }

    public static function meetings_finanzas() {
        return Meeting::where('comittee_id','=', '6')->count();
    }

    public static function meetings_logistica() {
        return Meeting::where('comittee_id','=', '7')->count();
    }

    public static function meetings_comunicacion() {
        return Meeting::where('comittee_id','=', '8')->count();
    }
}
