<?php

/* Authentication */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::get('/home', ['as' => '/home', function () {
    return view('user.home');
}]);
