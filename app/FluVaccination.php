<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FluVaccination extends Model
{
    //
    protected $fillable = ['q1', 'q2', 'q3', 'q4', 'q5', 'q6'];

    public static function storeFluVaccination($request, $record_id)
    {
        $flu_vaccination            = FluVaccination::whereRecordId($record_id)->first();

        if(count($flu_vaccination) == 0) {
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
        } else {
            $flu_vaccination->update([
                'q1' => $request->get('q1'),
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5')
            ]);

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
