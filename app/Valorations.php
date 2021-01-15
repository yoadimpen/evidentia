<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valorations extends Model
{
    protected $table = "valorations";

    protected $fillable = ["user_id", "title", "description", "date", "qualification"];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
