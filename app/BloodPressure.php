<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BloodPressure extends Model
{
    protected $fillable = ['q1','q2','q3','q4','q5','q6','q7'];

    public static function storeBloodPressure($request, $record_id)
    {
        $blood_pressure            = BloodPressure::whereRecordId($record_id)->first();

        if(count($blood_pressure) == 0) {
            $blood_pressure            = new BloodPressure();
            $blood_pressure->record_id = $record_id;
            $blood_pressure->user_id   = Auth::user()->id;
            $blood_pressure->q1        = $request->get('q1');
            $blood_pressure->q2        = $request->get('q2');
            $blood_pressure->q3        = $request->get('q3');
            $blood_pressure->q4        = $request->get('q4');
            $blood_pressure->q5        = $request->get('q5');
            $blood_pressure->q6        = $request->get('q6');
            $blood_pressure->q7        = $request->get('q7');

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
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5'),
                'q6' => $request->get('q6'),
                'q7' => $request->get('q7')
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
