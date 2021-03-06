<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Demographics2ndQt;
use App\Record;
use Illuminate\Support\Facades\Auth;

class Demographics2ndQtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($records_2nd_list_id)
    {
        $record = Record::find($records_2nd_list_id);

        // Update user status if user status was IDLE
        if(Auth::user()->status == 'IDLE') Auth::user()->addStatus('BCW', $record->id);

        // Check if there are checklist entries for this record
        if(count($record->checklist) != count($record->getList())) {
            // Delete first all related checklist
            Checklist::where('record_id', $record->id)->delete();

            // Generate list for this record
            foreach($record->getList() as $list) {
                $record->checklist()->save(new Checklist($list));
            }
        }

        return view('questionnaires.demographics_2', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $record_2nd_list_id)
    {
        $store_dem_2nd_qt = Demographics2ndQt::storeAnswer($request, $record_2nd_list_id);

        return $store_dem_2nd_qt;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
