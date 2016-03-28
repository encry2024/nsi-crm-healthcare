<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;

class Record2ndList extends Eloquent
{
    //
    protected $table = 'records_2nd_lists';

    public function user()
    {
        return $this->belongsTo(User::class, 'records_2nd_list_id');
    }

    public function demographic_2nd_qt()
    {
        return $this->hasOne(Demographics2ndQt::class, 'records_2nd_list_id');
    }

    public function breast_cancer_screening()
    {
        return $this->hasOne(BreastCancerScreening::class, 'records_2nd_list_id');
    }

    public function colon_cancer_screening()
    {
        return $this->hasOne(ColonCancerScreening::class, 'records_2nd_list_id');
    }

    public function flu_vaccination()
    {
        return $this->hasOne(FluVaccination::class, 'records_2nd_list_id');
    }

    public function pneumonia_vaccination()
    {
        return $this->hasOne(PneumoniaVaccination::class, 'records_2nd_list_id');
    }

    public function blood_pressure()
    {
        return $this->hasOne(BloodPressure::class, 'records_2nd_list_id');
    }

    public function diabetes_a1_c()
    {
        return $this->hasOne(DiabetesA1C::class, 'records_2nd_list_id');
    }

    public function diabetes_eye_exam()
    {
        return $this->hasOne(DiabetesEyeExam::class, 'records_2nd_list_id');
    }

    public function high_risk_meds()
    {
        return $this->hasOne(HighRiskMeds::class, 'records_2nd_list_id');
    }

    public function other()
    {
        return $this->hasOne(Other::class, 'records_2nd_list_id');
    }

    public static function show2ndList()
    {
        Auth::user()->addStatus('IDLE');

        $records_2nd_list = Record2ndList::whereUserId(Auth::user()->id);

        $ctr = 0;
        $records_2nd_list = $records_2nd_list->orderBy('updated_at')->paginate(20);
        $records_2nd_list->setPath("home");

        // get callbacks with filters
        $callbacks = Auth::user()->callbacks()->where('schedule', '>',date('Y-m-d', strtotime('-2 day', time())))->get();

        return view('medical_record_number.record_2nd_list', compact('records_2nd_list', 'ctr', 'callbacks'));
    }
}
