<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Other extends Model
{
    //
    protected $fillable = ['q1','q2','q3','q4','q5','q6','q6','q7','q8','q9','q10','q11','q12','q13'];

    public static function storeOther($request, $record_id)
    {
        $other            = Other::whereRecordId($record_id)->first();

        if(count($other) == 0) {
            $other            = new Other();
            $other->record_id = $record_id;
            $other->user_id   = Auth::user()->id;
            $other->q1        = $request->get('q1');
            $other->q2        = $request->get('q2');
            $other->q3        = $request->get('q3');
            $other->q4        = $request->get('q4');
            $other->q5        = $request->get('q5');
            $other->q6        = $request->get('q6');
            $other->q7        = $request->get('q7');
            $other->q8        = $request->get('q8');
            $other->q9        = $request->get('q9');
            $other->q10       = $request->get('q10');
            $other->q11       = $request->get('q11');
            $other->q12       = $request->get('q12');
            $other->q13       = $request->get('q13');

            if ($other->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $other->update([
                'q1' => $request->get('q1'),
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5'),
                'q6' => $request->get('q6'),
                'q7' => $request->get('q7'),
                'q8' => $request->get('q8'),
                'q9' => $request->get('q9'),
                'q10' => $request->get('q10'),
                'q11' => $request->get('q11'),
                'q12' => $request->get('q12'),
                'q13' => $request->get('q13')
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
