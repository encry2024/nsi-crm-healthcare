<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DiabetesA1C extends Model
{
    protected $table = 'diabetes_a1cs';
    protected $fillable = ['q1','q2','q3','q4','q5','q6','q7','q8','q9','q9_a','q10','q11'];

    //
    public static function storeDiabetesA1C($request, $record_id)
    {
        $diabetes_a1_c            = DiabetesA1C::whereRecordId($record_id)->first();

        if(count($diabetes_a1_c) == 0) {
            $diabetes_a1_c            = new DiabetesA1C();
            $diabetes_a1_c->record_id = $record_id;
            $diabetes_a1_c->user_id   = Auth::user()->id;
            $diabetes_a1_c->q1        = $request->get('q1');
            $diabetes_a1_c->q1_a        = $request->get('q1_a');
            $diabetes_a1_c->q2        = $request->get('q2');
            $diabetes_a1_c->q2_a        = $request->get('q2_a');
            $diabetes_a1_c->q3        = $request->get('q3');
            $diabetes_a1_c->q3_a        = $request->get('q3_a');
            $diabetes_a1_c->q4        = $request->get('q4');
            $diabetes_a1_c->q5        = $request->get('q5');
            $diabetes_a1_c->q5_a        = $request->get('q5_a');
            $diabetes_a1_c->q6        = $request->get('q6');
            $diabetes_a1_c->q6_a        = $request->get('q6_a');
            $diabetes_a1_c->q7        = $request->get('q7');
            $diabetes_a1_c->q7_a        = $request->get('q7_a');
            $diabetes_a1_c->q8        = $request->get('q8');
            $diabetes_a1_c->q9        = $request->get('q9');
            $diabetes_a1_c->q9_a        = $request->get('q9_a');
            $diabetes_a1_c->q10       = $request->get('q10');
            $diabetes_a1_c->q11       = $request->get('q11');

            if ($diabetes_a1_c->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $diabetes_a1_c->update([
                'q1' => $request->get('q1'),
                'q1_a' => $request->get('q1_a'),
                'q2' => $request->get('q2'),
                'q2_a' => $request->get('q2_a'),
                'q3' => $request->get('q3'),
                'q3_a' => $request->get('q3_a'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5'),
                'q5_a' => $request->get('q5_a'),
                'q6' => $request->get('q6'),
                'q6_a' => $request->get('q6_a'),
                'q7' => $request->get('q7'),
                'q7_a' => $request->get('q7_a'),
                'q8' => $request->get('q8'),
                'q9' => $request->get('q9'),
                'q9_a' => $request->get('q9_a'),
                'q10' => $request->get('q10'),
                'q11' => $request->get('q11'),
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
