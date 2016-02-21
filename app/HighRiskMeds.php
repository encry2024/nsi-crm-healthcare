<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HighRiskMeds extends Model
{
    //
    public static function storeHighRiskMeds($request, $record_id)
    {
        $high_risk_meds            = new HighRiskMeds();
        $high_risk_meds->record_id = $record_id;
        $high_risk_meds->user_id   = Auth::user()->id;
        $high_risk_meds->q1        = $request->get('q1');
        $high_risk_meds->q2        = $request->get('q2');
        $high_risk_meds->q3        = $request->get('q3');

        if ($high_risk_meds->save()) {
            return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
        } else {
            return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
        }
    }
}
