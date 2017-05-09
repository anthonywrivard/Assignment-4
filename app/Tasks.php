<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task_status()
    {
        return $this->belongsTo('App\TaskStatus','status_id');
    }


    public function taskuser()
    {
        return $this->hasOne('App\TaskUsers');
    }

}
