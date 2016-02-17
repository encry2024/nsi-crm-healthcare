<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Disposition;

class HighRiskMedsController extends Controller
{
    //


    /**
     * HighRiskMedsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showHighRiskMedsView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.high_risk_meds', compact('record', 'dispositions'));
    }
}
