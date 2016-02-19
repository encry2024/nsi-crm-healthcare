<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FluVaccination extends Model
{
    //

    public static function storeFluVaccination($request, $record_id)
    {
        $flu_vaccination            = new FluVaccination();
        $flu_vaccination->record_id = $record_id;
        $flu_vaccination->user_id   = Auth::user()->id;
        $flu_vaccination->q1        = $request->get('q1');
        $flu_vaccination->q2        = $request->get('q2');
        $flu_vaccination->q3        = $request->get('q3');
        $flu_vaccination->q4        = $request->get('q4');
        $flu_vaccination->q5        = $request->get('q5');
        $flu_vaccination->q6        = $request->get('q6');

        if ($flu_vaccination->save()) {
            return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
        } else {
            return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
        }
    }
}
