<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcomittee extends Model
{
    public function comittee()
    {
        return $this->belongsTo('App\Comittee');
    }

    public static function subcomitte_presidencia()
   {
       return Subcomittee::where('comittee_id', '=', '1')->count();
   }

   public static function subcomitte_secretaria()
   {
       return Subcomittee::where('comittee_id', '=', '2')->count();
   }

   public static function subcomitte_programa()
   {
       return Subcomittee::where('comittee_id', '=', '3')->count();
   }

   public static function subcomitte_igualdad()
   {
       return Subcomittee::where('comittee_id', '=', '4')->count();
   }

   public static function subcomitte_sostenibilidad()
   {
       return Subcomittee::where('comittee_id', '=', '5')->count();
   }

   public static function subcomitte_finanzas()
   {
       return Subcomittee::where('comittee_id', '=', '6')->count();
   }

   public static function subcomitte_logistica()
   {
       return Subcomittee::where('comittee_id', '=', '7')->count();
   }

   public static function subcomitte_comunicacion()
   {
       return Subcomittee::where('comittee_id', '=', '8')->count();
   }
}
