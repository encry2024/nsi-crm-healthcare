<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Disposition;

class FluVaccinationController extends Controller
{
    /**
     * FluVaccinationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showFluVaccinationView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.flu_vaccination', compact('record', 'dispositions'));
    }
}
