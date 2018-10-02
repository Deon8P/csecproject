<?php

//Register
Route::get('/', 'RegistrationController@index');
Route::get('/register', 'RegistrationController@index');
Route::post('/register/manager', 'RegistrationController@storeManager');
Route::post('/register/employee', 'RegistrationController@storeEmployee');

//Sessions
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login/manager', 'SessionsController@storeManagerSession');
Route::post('/login/employee', 'SessionsController@storeEmployeeSession');
Route::get('/logout', 'SessionsController@destroy');

//Employee
Route::get('/employee','EmployeesController@index')->name('employee');

//Manager
Route::get('/manager','ManagersController@index')->name('manager');

//Leave
