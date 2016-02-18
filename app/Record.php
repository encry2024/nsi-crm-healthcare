<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Record extends Eloquent
{
    //
    protected $fillable = ['first_name', 'last_name', 'reference_no', 'date_of_birth', 'call_notes', 'btn', 'last_disposition'];

    public function history() {
        return $this->hasMany('App\History');
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function storeRecord($request)
    {
        $record = Record::whereBtn($request->get('btn'))->first();

        $first_name = ucfirst(strtolower($request->get('first_name')));
        $last_name = ucfirst(strtolower($request->get('last_name')));

        if (count($record) == 0) {
            $record = new Record();
            $record->first_name = $first_name;
            $record->last_name = $last_name;
            $record->mrn = $request->get('mrn');
            $record->age = $request->get('age');
            $record->btn = $request->get('btn');
            $record->reference_no = $request->get('reference_no');
            $record->date_of_birth = date('Y-m-d', strtotime($request->get('date_of_birth')));
            $record->call_notes = $request->get('call_notes');
            $record->save();

            return redirect()->to('/record/' . $record->id)->with('message', 'Record has been successfully saved');
        }

        $update_record = $record->update([
            'call_notes' => $request->get('call_notes')
        ]);

        return redirect()->back()->with('message', 'Record has been successfully updated');
    }

    public static function updateRecord($request, $record)
    {
        $record->update([
            'first_name'    => $request->get('first_name'),
            'last_name'     => $request->get('last_name'),
            'btn'           => $request->get('btn'),
            'reference_no'  => $request->get('reference_no'),
            'date_of_birth' => date('Y-m-d', strtotime($request->get('date_of_birth'))),
            'call_notes'    => $request->get('call_notes'),
            'last_disposition'  => $request->get('disposition')
        ]);

        // Insert record history
        $record->history()->save(new History(['disposition_id' => $request->get('disposition')]));

        return redirect()->back()->with('message', 'Record successfully updated');
    }
}
