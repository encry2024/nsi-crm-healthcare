<?php

namespace App\Http\Controllers;

use App\FluVaccination;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Disposition;
use Illuminate\Support\Facades\Auth;

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

        // Update user status if user status was IDLE
        if(Auth::user()->status == 'IDLE') Auth::user()->addStatus('BCW', $record->id);

        return view('questionnaires.flu_vaccination', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        FluVaccination::unguard();
        $store_flu_vaccination = FluVaccination::storeFluVaccination($request, $record_id);

        return $store_flu_vaccination;
    }

    public function showFluVaccination($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        // Update user status if user status was IDLE
        if(Auth::user()->status == 'IDLE') Auth::user()->addStatus('BCW', $record->id);

        return view('admin.flu_vaccination', compact('record', 'dispositions'));
    }
}
