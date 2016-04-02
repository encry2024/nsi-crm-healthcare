<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordList extends Model
{
    //
    protected $table = 'lists';

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
