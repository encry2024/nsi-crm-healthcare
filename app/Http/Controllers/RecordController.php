<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Record;
use App\Http\Requests\StoreBtnRequest;
use App\Disposition;
use App\Checklist;


class RecordController extends Controller
{
    /**
     * RecordController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreBtnRequest $request)
    {
        $store_record = Record::storeRecord($request);

        return $store_record;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($record)
    {
        // Check if there are checklist entries for this record
        if(count($record->checklist) != count($record->getList())) {
            // Delete first all related checklist
            Checklist::where('record_id', $record->id)->delete();

            // Generate list for this record
            foreach($record->getList() as $list) {
                $record->checklist()->save(new Checklist($list));
            }
        }

        $dispositions = Disposition::all();
        $record = Record::find($record->id);    // Reinstantiate.. To reflect immediately the changes in checklist
        return view('medical_record_number.show', compact('record', 'dispositions'));
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
    public function update(Request $request, $record)
    {
        $update_record = Record::updateRecord($request, $record);

        return $update_record;
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

    public function showCallbacks(Record $record) {
        $dispositions = Disposition::all();

        return view('medical_record_number.callbacks', compact('record', 'dispositions'));
    }

    public function addCallback(Request $request, Record $record) {
        return $record->storeCallback($request);
    }

    public function showHistory(Record $record) {
        $dispositions = Disposition::all();

        return view('medical_record_number.history', compact('record', 'dispositions'));
    }

    public function updateChecklist(Request $request, Record $record) {
        return $record->updateChecklist($request);
    }
}
