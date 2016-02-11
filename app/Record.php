<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Record extends Eloquent
{
    //
    protected $fillable = ['reference_no', 'date_of_birth', 'call_notes'];

    public static function storeRecord($request)
    {
        $record = Record::whereBtn($request->get('btn'))->first();

        if (count($record) == 0) {
            $record = new Record();
            $record->btn = $request->get('btn');
            $record->reference_no = $request->get('reference_no');
            $record->date_of_birth = date('Y-m-d', strtotime($request->get('date_of_birth')));
            $record->call_notes = $request->get('call_notes');
            $record->save();

            return redirect()->to('/home')->with('message', 'Record has been successfully saved');
        }

        $update_record = $record->update([
            'call_notes' => $request->get('call_notes')
        ]);

        return redirect()->back()->with('message', 'Record has been successfully updated');
    }

    public static function updateRecord($request, $record)
    {
        $update_record = Record::find($record->id)->update([
            'reference_no'  => $request->get('reference_no'),
            'date_of_birth' => date('Y-m-d', strtotime($request->get('date_of_birth'))),
            'call_notes'    => $request->get('call_notes')
        ]);

        return redirect()->back()->with('message', 'Record was successfully updated');
    }
}
