<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Demographics extends Model
{
    //
    protected $table = 'demographics';

    public static function storeAnswer($request, $record_id)
    {
        $demographics            = new Demographics();
        $demographics->record_id = $record_id;
        $demographics->user_id   = Auth::user()->id;
        $demographics->q1        = $request->get('q1');
        $demographics->q2        = $request->get('q2');
        $demographics->q3        = $request->get('q3');
        $demographics->q4        = $request->get('q4');
        $demographics->q5        = $request->get('q5');

        if ($demographics->save()) {
            return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
        } else {
            return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
        }
    }
}
