<?php

/* Authentication */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::get('/home', ['as' => '/home', function () {
    return view('user.home');
}]);


Route::get('add/btn/{btn_no}', ['as' => 'add_btn', function () {
    return view('btn.create');
}]);