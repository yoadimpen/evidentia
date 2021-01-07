<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contacts";

    protected $fillable = ["user_id", "name", "surname", "phone", "company"];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
