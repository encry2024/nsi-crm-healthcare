<?php

Route::get('/', function () {
    return redirect()->to('/home');
});

Route::get('/home', ['middleware' => 'auth', 'as' => '/home', function () {
    return view('user.home');
}]);

/* Authentication */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// Record Model
Route::bind('record', function($id) { return App\Record::whereId($id)->first(); });
Route::resource('record', 'RecordController');
Route::get('add/medical_record/{mrn}', ['as' => 'add_mrn', function ($mrn) {
    return view('medical_record_number.create', compact('mrn'));
}]);

get('record_query/{query}', function ($query)
{
    $json = [];
    $records = App\Record::where('mrn', 'LIKE', '%'.$query.'%')->get();

    foreach ($records as $record) {
        $json['items'][] = array(
            'title' => 'Medical Record Number# ' . $record->mrn,
            'description' => 'Patient\s Name: ' . $record->fullName() . '<br>' . 'Reference Number# ' . $record->reference_no,
            'html_url' => route('record.show', $record->id)
        );
    }

    return $json;
});

get('record/show/{record_id}', ['as' => 'show_record', function($record) {
    $record = Record::find($record);

    return view('medical_record_number.show', compact('record'));
}]);



// Questionnaires
Route::get('{record_id}/questionnaire/breast_cancer_screening', ['as' => 'bcs',  'uses' => 'BreastCancerScreeningController@showBreastCancerScreeningView']);
Route::get('{record_id}/questionnaire/colon_cancer_screening',  ['as' => 'ccs',  'uses' => 'ColonCancerScreeningController@showColonCancerScreeningView']);
Route::get('{record_id}/questionnaire/flu_vaccination',         ['as' => 'fv',   'uses' => 'FluVaccinationController@showFluVaccinationView']);
Route::get('{record_id}/questionnaire/pneumonia_vaccination',   ['as' => 'pv',   'uses' => 'PneumoniaVaccinationController@showPneumoniaVaccinationView']);
Route::get('{record_id}/questionnaire/blood_pressure',          ['as' => 'bp',   'uses' => 'BloodPressureController@showBloodPressureView']);
Route::get('{record_id}/questionnaire/diabetes_A1_C',           ['as' => 'da1c', 'uses' => 'DiabetesA1CController@showDiabetesA1cView']);
Route::get('{record_id}/questionnaire/diabetes_eye_exam',       ['as' => 'dee',  'uses' => 'DiabetesEyeExamController@showDiabetesEyeExamView']);
Route::get('{record_id}/questionnaires/high_risk_meds',         ['as' => 'hrm',  'uses' => 'HighRiskMedsController@showHighRiskMedsView']);
Route::get('{record_id}/questionnaire/others',                  ['as' => 'o',    'uses' => 'OtherController@showOtherView']);

// POST
Route::post('{record_id}/save_answer/demographics',             ['as' => 'submit_demographics',            'uses' => 'DemographicsController@store']);
Route::post('{record_id}/save_answer/breast_cancer_screening',  ['as' => 'submit_breast_cancer_screening', 'uses' => 'BreastCancerScreeningController@store']);
Route::post('{record_id}/save_answer/colon_cancer_screening',   ['as' => 'submit_colon_cancer_screening',  'uses' => 'ColonCancerScreeningController@store']);
Route::post('{record_id}/save_answer/flu_vaccination',          ['as' => 'submit_flu_vaccination',         'uses' => 'FluVaccinationController@store']);
Route::post('{record_id}/save_answer/pneumonia_vaccination',    ['as' => 'submit_pneuomia_vaccination',    'uses' => 'PneumoniaVaccinationController@store']);
Route::post('{record_id}/save_answer/blood_pressure',           ['as' => 'submit_blood_pressure',          'uses' => 'BloodPressureController@store']);
Route::post('{record_id}/save_answer/diabetes_A1_C',            ['as' => 'submit_diabetes_a1_c',           'uses' => 'DiabetesA1CController@store']);
Route::post('{record_id}/save_answer/diabetes_eye_exam',        ['as' => 'submit_diabetes_eye_exam',       'uses' => 'DiabetesEyeExamController@store']);
Route::post('{record_id}/save_answer/high_risk_meds',           ['as' => 'submit_high_risk_meds',          'uses' => 'HighRiskMedsController@store']);
Route::post('{record_id}/save_answer/others',                   ['as' => 'submit_others',                  'uses' => 'OtherController@store']);

Route::get('record/{record}/callbacks', 'RecordController@showCallbacks')->name('callbacks');
Route::post('record/{record}/callbacks','RecordController@addCallback')->name('addcallback');
Route::get('record/{record}/history', 'RecordController@showHistory')->name('history');
Route::post('record/{record}/checklist', 'RecordController@updateChecklist')->name('checklist');