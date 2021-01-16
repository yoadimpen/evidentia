<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table = "incidents";

    protected $fillable = ["user_id", "title", "description", "date", "solution"];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
