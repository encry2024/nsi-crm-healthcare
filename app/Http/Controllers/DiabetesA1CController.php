<?php

namespace App\Http\Controllers;

use App\Disposition;
use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DiabetesA1C;

class DiabetesA1CController extends Controller
{
    //

    /**
     * DiabetesA1CController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDiabetesA1cView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.diabetes_a1_c', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        $store_diabetes_a1_c = DiabetesA1C::storeDiabetesA1C($request, $record_id);

        return $store_diabetes_a1_c;
    }
}
