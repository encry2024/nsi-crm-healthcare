<?php

namespace App\Http\Controllers;

use App\BreastCancerScreening;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Disposition;
use Illuminate\Support\Facades\Auth;

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

        // Update user status if user status was IDLE
        if(Auth::user()->status == 'IDLE') Auth::user()->addStatus('BCW', $record->id);

        return view('questionnaires.breast_cancer_screening', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        BreastCancerScreening::unguard();
        $store_breast_cancer_screening = BreastCancerScreening::storeBreastCancerScreening($request, $record_id);

        return $store_breast_cancer_screening;
    }
}
