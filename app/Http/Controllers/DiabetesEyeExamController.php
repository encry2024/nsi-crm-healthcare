<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use App\Disposition;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DiabetesEyeExamController extends Controller
{
    //


    /**
     * DiabetesEyeExamController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDiabetesEyeExamView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.diabetes_eye_exam', compact('record', 'dispositions'));
    }
}
