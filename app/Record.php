<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Symfony\Component\HttpFoundation\Request;

class Record extends Eloquent
{
    private $list = array(
        ['name' => 'bcs', 'description' => 'Breast Cancer Screening'],
        ['name' => 'ccs', 'description' => 'Colorectal Cancer Screening'],
        ['name' => 'iv', 'description' => 'Influenza Vaccine'],
        ['name' => 'pv', 'description' => 'Pneumonia Vaccine'],
        ['name' => 'chbp', 'description' => 'Controlling High Blood Pressure'],
        ['name' => 'hapc', 'description' => 'Hemoglobin A1C Poor Control'],
        ['name' => 'dee', 'description' => 'Diabetic Eye Exam'],
        ['name' => 'hrm', 'description' => 'High Risk Meds']
    );

    protected $fillable = ['name', 'reference_no', 'date_of_birth', 'call_notes', 'btn', 'last_disposition', 'insurance', 'pcp', 'gender', 'rn', 'created_at', 'updated_at', 'update_timestamp'];

    public function history() {
        return $this->hasMany('App\History')->orderBy('created_at');
    }

    public function getList() {
        return $this->list;
    }

    public function callback() {
        return $this->hasMany('App\Callback')->orderBy('schedule');
    }

    public function checklist() {
        return $this->hasMany('App\Checklist');
    }

    public function demographic()
    {
        return $this->hasOne(Demographics::class);
    }

    public function breast_cancer_screening()
    {
        return $this->hasOne(BreastCancerScreening::class);
    }

    public function colon_cancer_screening()
    {
        return $this->hasOne(ColonCancerScreening::class);
    }

    public function flu_vaccination()
    {
        return $this->hasOne(FluVaccination::class);
    }

    public function pneumonia_vaccination()
    {
        return $this->hasOne(PneumoniaVaccination::class);
    }

    public function blood_pressure()
    {
        return $this->hasOne(BloodPressure::class);
    }

    public function diabetes_a1_c()
    {
        return $this->hasOne(DiabetesA1C::class);
    }

    public function diabetes_eye_exam()
    {
        return $this->hasOne(DiabetesEyeExam::class);
    }

    public function high_risk_meds()
    {
        return $this->hasOne(HighRiskMeds::class);
    }

    public function other()
    {
        return $this->hasOne(Other::class);
    }

    public static function storeRecord($request)
    {
        $record = Record::whereBtn($request->get('btn'))->first();

        $btn = str_replace(' ', '', $request->get('btn')); // Replaces all spaces with hyphens.
        $stripped_btn = preg_replace('/[^A-Za-z0-9\-]/', '', $btn); // Removes special chars.

        if (count($record) == 0) {
            $record = new Record();
            $record->user_id = Auth::user()->id;
            $record->name = $request->get('name');;
            $record->mrn = $request->get('mrn');
            $record->age = $request->get('age');
            $record->btn = $stripped_btn;
            $record->rn = $request->get('rn');
            $record->insurance = $request->get('insurance');
            $record->pcp = $request->get('pcp');
            $record->gender = $request->get('gender');
            $record->reference_no = $request->get('reference_no');
            $record->date_of_birth = date('Y-m-d', strtotime($request->get('date_of_birth')));
            $record->call_notes = $request->get('call_notes');

            if ($record->save()) {
                // Add checklist entries
                foreach($record->list as $list) {
                    $record->checklist()->save(new Checklist($list));
                }

                return redirect()->to('/record/' . $record->id)->with('message', 'Record has been successfully saved')->with('msg_type', 'success');
            } else {
                return redirect()->to('/record/' . $record->id)->with('message', 'Record was not able to save. Please review the entries.')->with('msg_type', 'negative');
            }

        }

        $update_record = $record->update([
            'call_notes' => $request->get('call_notes')
        ]);

        return redirect()->back()->with('message', 'Record has been successfully updated')->with('msg_type', 'success');
    }

    public static function updateRecord($request, $record)
    {
        $record->update([
            'name'    => $request->get('name'),
            'btn'           => $request->get('btn'),
            'reference_no'  => $request->get('reference_no'),
            'date_of_birth' => date('Y-m-d', strtotime($request->get('date_of_birth'))),
            'age'           => $request->get('age'),
            'call_notes'    => $request->get('call_notes'),
            'last_disposition'  => $request->get('disposition'),
            'update_timestamp' => date('Y-m-d', strtotime($request->get('update_timestamp'))),
            'rn'  => $request->get('rn')
        ]);

        // Insert record history
        if($request->get('disposition') != '') {
            $record->history()->save(new History(['disposition_id' => $request->get('disposition')]));

            // Redirect to dashboard
            return redirect('home');
        }

        return redirect()->back()->with('message', 'Record successfully updated');
    }

    public function storeCallback($request) {
        // Insert record history
        $this->callback()
            ->save
            (new Callback(
                [
                    'notes'     => $request->get('notes'),
                    'schedule'  => date('Y-m-d H:i:s', strtotime($request->get('callback_date') . ' ' . $request->get('callback_hour') . ':' . $request->get('callback_minute') . ':00')),
                    'user_id' => Auth::user()->id
                ]
            ));

        return redirect()->back()->with('message', 'Callback successfully added');
    }

    public function updateChecklist(Request $request) {
        $checklists = $request->all();
        unset($checklists['_token']);


        // Update each submitted checklist to 1
        foreach($checklists as $index => $value) {
            $temp = explode("_", $index);
            Checklist::where('id', $temp[1])->update(array('value' => $value));
        }

        return redirect()->back()->with('message', 'Checklist successfully updated')->with('msg_type', 'success');
    }

    public function getLastDisposition() {
        return History::where('record_id', $this->id)->orderBy('created_at', 'DESC')->first();
    }
}
