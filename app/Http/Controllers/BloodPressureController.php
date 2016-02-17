<?php

namespace App\Http\Controllers;

use App\Disposition;
use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BloodPressureController extends Controller
{
    //

    /**
     * BloodPressureController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showBloodPressureView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.blood_pressure', compact('record', 'dispositions'));
    }
}
