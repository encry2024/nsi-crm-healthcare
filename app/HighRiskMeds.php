<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HighRiskMeds extends Model
{
    //
    protected $fillable = ['q1','q2','q3','q4','q5'];

    public static function storeHighRiskMeds($request, $record_id)
    {
        $high_risk_meds            = HighRiskMeds::whereRecordId($record_id)->first();

        if(count($high_risk_meds) == 0) {
            $high_risk_meds            = new HighRiskMeds();
            $high_risk_meds->record_id = $record_id;
            $high_risk_meds->user_id   = Auth::user()->id;
            $high_risk_meds->q1        = $request->get('q1');
            $high_risk_meds->q2        = $request->get('q2');
            $high_risk_meds->q3        = $request->get('q3');
            $high_risk_meds->q4        = $request->get('q4');
            $high_risk_meds->q5        = $request->get('q5');

            if ($high_risk_meds->save()) {
                // Touch parent model
                $record = Record::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $high_risk_meds->update([
                'q1' => $request->get('q1'),
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5')
            ]);

            // Touch parent model
            $record = Record::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
