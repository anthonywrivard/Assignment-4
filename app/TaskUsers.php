<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUsers extends Model
{

    public function task()
    {
        return $this->belongsTo('App\Tasks');
    }




}
