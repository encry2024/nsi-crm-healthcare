<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use App\Disposition;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DiabetesEyeExam;
use Illuminate\Support\Facades\Auth;

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

        // Update user status if user status was IDLE
        if(Auth::user()->status == 'IDLE') Auth::user()->addStatus('BCW', $record->id);

        return view('questionnaires.diabetes_eye_exam', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        $store_diabetes_eye_exam = DiabetesEyeExam::storeDiabetesEyeExam($request, $record_id);

        return $store_diabetes_eye_exam;
    }
}
