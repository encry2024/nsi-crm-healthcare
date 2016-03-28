<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;

class Demographics2ndQt extends Eloquent
{
    //
    protected $table = 'demographics_2nd_qts';

    protected $fillable = ['q1', 'q1_a','q2', 'q2_a', 'q3', 'q4', 'q5', 'q6', 'q6_a'];
    //date('Y-m-d H:i:s', strtotime($request->get('callback_date') . ' ' . $request->get('callback_hour') . ':' . $request->get('callback_minute') . ':00')),
    public static function storeAnswer($request, $record_id)
    {
        $demographics            = Demographics2ndQt::where('records_2nd_list_id', $record_id)->first();

        if (count($demographics) == 0) {
            $demographics            = new Demographics2ndQt();
            $demographics->records_2nd_list_id = $record_id;
            $demographics->user_id   = Auth::user()->id;
            $demographics->q1        = $request->get('q1');
            $demographics->q1_a      = $request->get('q1_a');
            $demographics->q2        = $request->get('q2');
            $demographics->q2_a      = $request->get('q2_a');
            $demographics->q3        = $request->get('q3');
            $demographics->q4        = $request->get('q4');
            $demographics->q5        = $request->get('q5');
            $demographics->q6        = $request->get('q6');
            $demographics->q6_a      = $request->get('q6_a');

            if ($demographics->save()) {
                // Touch parent model
                $record = Record2ndList::find($record_id);
                $record->touch();

                return redirect()->back()->with('message', 'Answer sheet was successfully saved.')->with('msg_type', 'positive');
            } else {
                return redirect()->back()->with('message', 'Answer sheet was not saved. Please review the answers')->with('msg_type', 'negative');
            }
        } else {
            $demographics->update(
                [
                    'q1' => $request->get('q1'),
                    'q1_a' => $request->get('q1_a'),
                    'q2' => $request->get('q2'),
                    'q2_a' => $request->get('q2_a'),
                    'q3' => $request->get('q3'),
                    'q4' => $request->get('q4'),
                    'q5' => $request->get('q5'),
                    'q6' => $request->get('q6'),
                    'q6_a' => $request->get('q6_a')
                ]
            );

            // Touch parent model
            $record = Record2ndList::find($record_id);
            $record->touch();

            return redirect()->back()->with('message', 'Answer sheet was successfully updated.')->with('msg_type', 'positive');
        }
    }
}
