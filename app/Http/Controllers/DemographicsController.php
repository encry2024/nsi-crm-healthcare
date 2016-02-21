<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Demographics;

class DemographicsController extends Controller
{
    //

    /**
     * DemographicsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $record_id)
    {
        $store_answer = Demographics::storeAnswer($request, $record_id);

        return $store_answer;
    }
}
