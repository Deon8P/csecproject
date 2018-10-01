<?php

//Register
Route::get('/', 'RegistrationController@index');
Route::get('/register', 'RegistrationController@index');
Route::post('/register', 'RegistrationController@store');

//Sessions
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@storeManagerSession');
Route::get('/logout', 'SessionsController@destroy');

//Employee
Route::get('/employee','EmployeesController@index')->name('employee');

//Manager
Route::get('/manager','ManagersController@index')->name('manager');

//Leave
