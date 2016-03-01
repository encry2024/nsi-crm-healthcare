<?php

namespace App\Http\Controllers;

use App\Disposition;
use App\Other;
use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OtherController extends Controller
{

    /**
     * OtherController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showOtherView($record_id)
    {
        $record = Record::find($record_id);
        $dispositions = Disposition::all();

        // Update user status if user status was IDLE
        if(Auth::user()->status == 'IDLE') Auth::user()->addStatus('BCW', $record->id);

        return view('questionnaires.other', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        Other::unguard();
        $store_other = Other::storeOther($request, $record_id);

        return $store_other;
    }
}
