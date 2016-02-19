<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    protected $fillable = ['record_id', 'user_id', 'schedule'];

    protected $dates = ['created_at', 'updated_at', 'schedule'];
}
