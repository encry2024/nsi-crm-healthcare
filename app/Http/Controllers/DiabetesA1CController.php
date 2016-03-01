<?php

namespace App\Http\Controllers;

use App\Disposition;
use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DiabetesA1C;
use Illuminate\Support\Facades\Auth;

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

        // Update user status if user status was IDLE
        if(Auth::user()->status == 'IDLE') Auth::user()->addStatus('BCW', $record->id);

        return view('questionnaires.diabetes_a1_c', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        DiabetesA1C::unguard();
        $store_diabetes_a1_c = DiabetesA1C::storeDiabetesA1C($request, $record_id);

        return $store_diabetes_a1_c;
    }
}
