<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FluVaccination extends Model
{
    //
    protected $fillable = ['q1', 'q1_a', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q7_a'];

    public static function storeFluVaccination($request, $record_id)
    {
        $flu_vaccination            = FluVaccination::whereRecordId($record_id)->first();

        if(count($flu_vaccination) == 0) {
            $flu_vaccination            = new FluVaccination();
            $flu_vaccination->record_id = $record_id;
            $flu_vaccination->user_id   = Auth::user()->id;
            $flu_vaccination->q1        = $request->get('q1');
            $flu_vaccination->q1_a        = $request->get('q1_a');
            $flu_vaccination->q2        = $request->get('q2');
            $flu_vaccination->q2_a        = $request->get('q2_a');
            $flu_vaccination->q3        = $request->get('q3');
            $flu_vaccination->q3_a        = $request->get('q3_a');
            $flu_vaccination->q4        = $request->get('q4');
            $flu_vaccination->q5        = $request->get('q5');
            $flu_vaccination->q6        = $request->get('q6');
            $flu_vaccination->q7        = $request->get('q7');
            $flu_vaccination->q7_a        = $request->get('q7_a');

            if ($flu_vaccination->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $flu_vaccination->update([
                'q1' => $request->get('q1'),
                'q1_a' => $request->get('q1_a'),
                'q2' => $request->get('q2'),
                'q2_a' => $request->get('q2_a'),
                'q3' => $request->get('q3'),
                'q3_a' => $request->get('q3_a'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5'),
                'q6' => $request->get('q6'),
                'q7' => $request->get('q7'),
                'q7_a' => $request->get('q7_a')
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
