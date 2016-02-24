<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ColonCancerScreening extends Model
{
    //
    protected $fillable = ['q1','q2','q3','q4','q5','q6','q6','q7','q8'];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

    public static function storeColonCancerScreening($request, $record_id)
    {
        $colon_cancer_screening            = ColonCancerScreening::whereRecordId($record_id)->first();

        if (count($colon_cancer_screening) == 0) {
            $colon_cancer_screening            = new ColonCancerScreening();
            $colon_cancer_screening->record_id = $record_id;
            $colon_cancer_screening->user_id   = Auth::user()->id;
            $colon_cancer_screening->q1        = $request->get('q1');
            $colon_cancer_screening->q2        = $request->get('q2');
            $colon_cancer_screening->q3        = $request->get('q3');
            $colon_cancer_screening->q4        = $request->get('q4');
            $colon_cancer_screening->q5        = $request->get('q5');
            $colon_cancer_screening->q6        = $request->get('q6');
            $colon_cancer_screening->q7        = $request->get('q7');
            $colon_cancer_screening->q8        = $request->get('q8');

            if ($colon_cancer_screening->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $colon_cancer_screening->update([
                'q1' => $request->get('q1'),
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5'),
                'q6' => $request->get('q6'),
                'q7' => $request->get('q7'),
                'q8' => $request->get('q8'),
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
