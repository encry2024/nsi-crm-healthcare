<?php

namespace App\Http\Controllers;

use App\PneumoniaVaccination;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Disposition;


class PneumoniaVaccinationController extends Controller
{
    //

    /**
     * PneumoniaVaccinationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPneumoniaVaccinationView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        return view('questionnaires.pneumonia_vaccination', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        $store_pneumonia_vaccination = PneumoniaVaccination::storePneumoniaVaccination($request, $record_id);

        return $store_pneumonia_vaccination;
    }
}
