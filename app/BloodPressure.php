<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BloodPressure extends Model
{
    protected $fillable = ['q1','q2','q3','q4','q5','q5_a','q6','q7','q7_a'];

    public static function storeBloodPressure($request, $record_id)
    {
        $blood_pressure            = BloodPressure::whereRecordId($record_id)->first();

        if(count($blood_pressure) == 0) {
            $blood_pressure            = new BloodPressure();
            $blood_pressure->record_id = $record_id;
            $blood_pressure->user_id   = Auth::user()->id;
            $blood_pressure->q1        = $request->get('q1');
            $blood_pressure->q1_a        = $request->get('q1_a');
            $blood_pressure->q2        = $request->get('q2');
            $blood_pressure->q3        = $request->get('q3');
            $blood_pressure->q3_a        = $request->get('q3_a');
            $blood_pressure->q4        = $request->get('q4');
            $blood_pressure->q4_a        = $request->get('q4_a');
            $blood_pressure->q5        = $request->get('q5');
            $blood_pressure->q5_a        = $request->get('q5_a');
            $blood_pressure->q6        = $request->get('q6');
            $blood_pressure->q7        = $request->get('q7');
            $blood_pressure->q7_a        = $request->get('q7_a');

            if ($blood_pressure->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $blood_pressure->update([
                'q1' => $request->get('q1'),
                'q1_a' => $request->get('q1_a'),
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q3_a' => $request->get('q3_a'),
                'q4' => $request->get('q4'),
                'q4_a' => $request->get('q4_a'),
                'q5' => $request->get('q5'),
                'q5_a' => $request->get('q5_a'),
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
