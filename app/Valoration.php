<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoration extends Model
{
    protected $table = "valorations";

    protected $fillable = ["user_id", "title", 'comittee_id',"description","date", "qualification"];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
