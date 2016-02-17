<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Disposition;

class ColonCancerScreeningController extends Controller
{

    /**
     * ColonCancerScreeningController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showColonCancerScreeningView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.colon_cancer_screening', compact('record', 'dispositions'));
    }
}
