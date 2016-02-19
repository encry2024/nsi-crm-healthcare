<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['disposition_id'];

    public function disposition() {
        return $this->belongsTo('App\Disposition');
    }
}
