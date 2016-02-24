<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DiabetesEyeExam extends Model
{
    //
    protected $fillable = ['q1','q2','q3','q4','q5','q6','q6','q7','q8','q9','q10','q11'];

    public static function storeDiabetesEyeExam($request, $record_id)
    {
        $diabetes_eye_exam            = DiabetesEyeExam::whereRecordId($record_id)->first();

        if(count($diabetes_eye_exam) == 0) {
            $diabetes_eye_exam            = new DiabetesEyeExam();
            $diabetes_eye_exam->record_id = $record_id;
            $diabetes_eye_exam->user_id   = Auth::user()->id;
            $diabetes_eye_exam->q1        = $request->get('q1');
            $diabetes_eye_exam->q2        = $request->get('q2');
            $diabetes_eye_exam->q3        = $request->get('q3');
            $diabetes_eye_exam->q4        = $request->get('q4');
            $diabetes_eye_exam->q5        = $request->get('q5');
            $diabetes_eye_exam->q6        = $request->get('q6');
            $diabetes_eye_exam->q7        = $request->get('q7');
            $diabetes_eye_exam->q8        = $request->get('q8');
            $diabetes_eye_exam->q9        = $request->get('q9');
            $diabetes_eye_exam->q10       = $request->get('q10');
            $diabetes_eye_exam->q11       = $request->get('q11');

            if ($diabetes_eye_exam->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $diabetes_eye_exam->update([
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
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
