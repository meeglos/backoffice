<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Failure extends Model
{
    //
    protected $fillable = [
        'agent_id', 'comment', 'registered_at'
    ];
}
