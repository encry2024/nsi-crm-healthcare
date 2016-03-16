<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    protected $fillable = ['record_id', 'user_id', 'schedule', 'notes'];

    protected $dates = ['created_at', 'updated_at', 'schedule'];

    public function record() {
        return $this->belongsTo('App\Record');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
