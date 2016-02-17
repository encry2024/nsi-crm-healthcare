<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Disposition;

class BreastCancerScreeningController extends Controller
{
    //

    /**
     * BreastCancerScreeningController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showBreastCancerScreeningView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.breast_cancer_screening', compact('record', 'dispositions'));
    }
}
