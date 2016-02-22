<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BreastCancerScreening extends Model
{
    //
    protected $table = 'breast_cancer_screenings';
    protected $fillable = ['q1','q2','q3','q4','q5','q6','q6','q7','q8'];


    public static function storeBreastCancerScreening($request, $record_id)
    {
        $breast_cancer_screening            = BreastCancerScreening::whereRecordId($record_id)->first();

        if(count($breast_cancer_screening) == 0) {
            $breast_cancer_screening            = new BreastCancerScreening();
            $breast_cancer_screening->record_id = $record_id;
            $breast_cancer_screening->user_id   = Auth::user()->id;
            $breast_cancer_screening->q1        = $request->get('q1');
            $breast_cancer_screening->q2        = $request->get('q2');
            $breast_cancer_screening->q3        = $request->get('q3');
            $breast_cancer_screening->q4        = $request->get('q4');
            $breast_cancer_screening->q5        = $request->get('q5');
            $breast_cancer_screening->q6        = $request->get('q6');
            $breast_cancer_screening->q7        = $request->get('q7');
            $breast_cancer_screening->q8        = $request->get('q8');

            if ($breast_cancer_screening->save()) {
                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $breast_cancer_screening->update([
                'q1' => $request->get('q1'),
                'q2' => $request->get('q2'),
                'q3' => $request->get('q3'),
                'q4' => $request->get('q4'),
                'q5' => $request->get('q5'),
                'q6' => $request->get('q6'),
                'q7' => $request->get('q7'),
                'q8' => $request->get('q8'),
            ]);

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
