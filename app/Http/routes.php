<?php

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->to('/home');
});

// Fetch all records (Admin type)
Route::group(['prefix' => 'admin'], function () {

   Route::get('/dashboard', function () {
       $ctr = 0;
       $all_records = App\Record::with(['user' => function ($query) {
           $query->where('type', '=', 'agent');
       }]);

       $all_records = $all_records->orderBy('updated_at')->orderBy('gender')->orderBy('age', 'DESC')->paginate(20);
       $all_records->setPath('dashboard');

       $callbacks = App\Callback::with(['user' => function($query) {
           $query->where('type', '=', 'agent');
       }])->where('schedule', '>', date('Y-m-d', strtotime('-2 day', time())))->get();

       return view('auth.dashboard', compact('ctr', 'all_records', 'callbacks'));
   });

});

Route::get('/home', ['middleware' => 'auth', 'as' => '/home', function () {
    // Update user status to IDLE
    Auth::user()->addStatus('IDLE');

    $records = App\Record::whereUserId(Auth::user()->id);

    if(!empty(request('gender'))) {
        $records = $records->where('gender', request('gender'));
    }

    if(!empty(request('age_from'))) {
        $records = $records->where('age', '>=', request('age_from'));
    }

    if(!empty(request('age_to'))) {
        $records = $records->where('age', '<=', request('age_to'));
    }

    $ctr = 0;
    $records = $records->orderBy('updated_at')->orderBy('gender')->orderBy('age', 'DESC')->paginate(20);
    $records->setPath("home?gender=" . request('gender') . "&age_from=" . request('age_from') . "&age_to=" . request('age_to'));

    // get callbacks with filters
    $callbacks = Auth::user()->callbacks()->where('schedule', '>',date('Y-m-d', strtotime('-2 day', time())))->get();

    return view('user.home', compact('records', 'ctr', 'callbacks', 'all_records'));
}]);

Route::get('create/user', ['as' => 'create_user', 'uses' => 'UserController@create']);
Route::bind('user', function($id) { return App\User::whereId($id)->first(); });
Route::resource('user', 'UserController');

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
    $records = App\Record::where(function($subquery) use ($query)
    {
        $subquery->where('mrn', 'LIKE', '%'.$query.'%')
            ->orWhere('name', 'LIKE', '%'.$query.'%')
            ->orWhere('btn', 'LIKE', '%'.$query.'%');
    })->get();

    if (count($records) > 0) {
        foreach ($records as $record) {
            $json['items'][] = array(
                'title' => 'Patient\'s Name: ' . $record->name,
                'description' => 'MRN: ' . $record->mrn . '<br>' . 'Phone Number: ' . $record->btn,
                'html_url' => route('record.show', $record->id)
            );
        }

        return $json;
    } else {
        $json['items'][] = array(
            'title' => "\"$query\" doesn't exist",
            'description' => 'Record doesn\'t exist in our database.',
            'html_url' => '#'
        );

        return $json;
    }
});

get('record/show/{record_id}', ['as' => 'show_record', function($record) {
    $record = Record::find($record);

    return view('medical_record_number.show', compact('record'));
}]);


// Ajax for updating status
get('user/update_status/{record}/{status}', function($record, $status) {
    $user = App\User::find($record->user_id);

    $user->addStatus($status, $record->id);
    return;
});

get('user/update_status_break/{user}/{status}', function($user, $status) {
    $user->addStatus($status);
    return;
});

Route::get('auth/logout', 'Auth\AuthController@getLogout');


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
Route::post('record/{record}/store_state', 'RecordController@storeState')->name('store_state');