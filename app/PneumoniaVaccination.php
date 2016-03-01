<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PneumoniaVaccination extends Model
{
    //
    protected $fillable = ['q1','q1_a','q2','q3','q4','q5','q6','q6','q7','q8','q8_a','q9'];

    public static function storePneumoniaVaccination($request, $record_id)
    {
        $pneumonia_vaccination            = PneumoniaVaccination::whereRecordId($record_id)->first();

        if(count($pneumonia_vaccination) == 0) {
            $pneumonia_vaccination            = new PneumoniaVaccination();
            $pneumonia_vaccination->record_id = $record_id;
            $pneumonia_vaccination->user_id   = Auth::user()->id;
            $pneumonia_vaccination->q1        = $request->get('q1');
            $pneumonia_vaccination->q1_a        = $request->get('q1_a');
            $pneumonia_vaccination->q2        = $request->get('q2');
            $pneumonia_vaccination->q3        = $request->get('q3');
            $pneumonia_vaccination->q4        = $request->get('q4');
            $pneumonia_vaccination->q4_a        = $request->get('q4_a');
            $pneumonia_vaccination->q5        = $request->get('q5');
            $pneumonia_vaccination->q5_a        = $request->get('q5_a');
            $pneumonia_vaccination->q6        = $request->get('q6');
            $pneumonia_vaccination->q7        = $request->get('q7');
            $pneumonia_vaccination->q8        = $request->get('q8');
            $pneumonia_vaccination->q8_a        = $request->get('q8_a');
            $pneumonia_vaccination->q9        = $request->get('q9');

            if ($pneumonia_vaccination->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $pneumonia_vaccination->update([
                'q1' => $request->get('q1'),
                'q1_a' => $request->get('q1_a'),
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q4' => $request->get('q4'),
                'q4_a' => $request->get('q4_a'),
                'q5' => $request->get('q5'),
                'q5_a' => $request->get('q5_a'),
                'q6' => $request->get('q6'),
                'q7' => $request->get('q7'),
                'q8' => $request->get('q8'),
                'q8_a' => $request->get('q8_a'),
                'q9' => $request->get('q9'),
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
