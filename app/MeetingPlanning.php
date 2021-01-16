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
}
