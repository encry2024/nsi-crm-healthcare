<?php

namespace App\Http\Controllers;

use App\BloodPressure;
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

    public function store(Request $request, $record_id)
    {
        $store_blood_pressure = BloodPressure::storeBloodPressure($request, $record_id);

        return $store_blood_pressure;
    }
}
