<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DiabetesEyeExam extends Model
{
    //
    protected $fillable = ['q1','q2','q3','q4','q5','q6','q6','q7','q8','q9','q10','q11','q12','q13','q14','q15','q16','q17','q18'];

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
            $diabetes_eye_exam->q12       = $request->get('q12');
            $diabetes_eye_exam->q13       = $request->get('q13');
            $diabetes_eye_exam->q14       = $request->get('q14');
            $diabetes_eye_exam->q15       = $request->get('q15');
            $diabetes_eye_exam->q16       = $request->get('q16');
            $diabetes_eye_exam->q17       = $request->get('q17');
            $diabetes_eye_exam->q18       = $request->get('q18');

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
                'q12' => $request->get('q12'),
                'q13' => $request->get('q13'),
                'q14' => $request->get('q14'),
                'q15' => $request->get('q15'),
                'q16' => $request->get('q16'),
                'q17' => $request->get('q17'),
                'q18' => $request->get('q18')
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
