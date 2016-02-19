<?php

namespace App\Http\Controllers;

use App\Disposition;
use App\Other;
use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

        return view('questionnaires.other', compact('record', 'dispositions'));
    }

    public function store(Request $request, $record_id)
    {
        $store_other = Other::storeOther($request, $record_id);

        return $store_other;
    }
}
