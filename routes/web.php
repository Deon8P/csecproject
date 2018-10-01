<?php

Route::get('/', 'RegistrationController@index');
Route::post('/register', 'RegistrationController@store');