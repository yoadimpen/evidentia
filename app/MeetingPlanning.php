<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingPlanning extends Model
{
    protected $table="meeting_planning";

    protected $fillable = [
        'id','title','datetime','place','type'
    ];

      public function users()
      {
          return $this->belongsToMany('App\User');
      }

      public function comittee()
      {
          return $this->belongsTo('App\Comittee');
      }

      // Peticón de cambio para el M3
      public static function ordinary_plannings(){
          return MeetingPlanning::where('type','ORDINARY')->get();
      }

      public static function extraordinary_plannings(){
          return MeetingPlanning::where('type','EXTRAORDINARY')->get();
      }
      
}
