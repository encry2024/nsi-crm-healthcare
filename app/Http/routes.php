<?php

/* Authentication */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::get('/home', ['as' => '/home', function () {
    return view('user.home');
}]);


// Record Model
Route::bind('record', function($id) { return App\Record::whereId($id)->first(); });
Route::resource('record', 'RecordController');

Route::get('add/btn/{btn_no}', ['as' => 'add_btn', function ($btn) {
    return view('btn.create', compact('btn'));
}]);

get('record_query/{query}', function ($query)
{
    $json = [];
    $records = App\Record::where('btn', 'LIKE', '%'.$query.'%')->get();

    foreach ($records as $record) {
        $json['items'][] = array(
            'title' => 'BTN/Phone Number: ' . $record->btn,
            'description' => 'Reference Number: ' . $record->reference_no,
            'html_url' => route('record.show', $record->id)
        );
    }

    return $json;
});
get('record/show/{record_id}', ['as' => 'show_record', function($record) {
    $record = Record::find($record);

    return view('btn.show', compact('record'));
}]);