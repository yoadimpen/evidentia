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
        return Meeting::where('comittee_id','=', '1')->orderByDesc('updated_at')->get();
    }

    public static function meetings_secretaria() {
        return Meeting::where('comittee_id','=', '2')->orderByDesc('updated_at')->get();
    }

    public static function meetings_programa() {
        return Meeting::where('comittee_id','=', '3')->orderByDesc('updated_at')->get();
    }

    public static function meetings_igualdad() {
        return Meeting::where('comittee_id','=', '4')->orderByDesc('updated_at')->get();
    }

    public static function meetings_sostenibilidad() {
        return Meeting::where('comittee_id','=', '5')->orderByDesc('updated_at')->get();
    }

    public static function meetings_finanzas() {
        return Evidence::where('comittee_id','=', '6')->orderByDesc('updated_at')->get();
    }

    public static function meetings_logistica() {
        return Meeting::where('comittee_id','=', '7')->orderByDesc('updated_at')->get();
    }

    public static function meetings_comunicacion() {
        return Meeting::where('comittee_id','=', '8')->orderByDesc('updated_at')->get();
    }
}
