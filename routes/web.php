<?php

//Register
Route::get('/register', 'RegistrationController@index');
Route::post('/register/manager', 'RegistrationController@storeManager');

//Sessions
Route::get('/', 'SessionsController@create');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login/manager', 'SessionsController@storeManagerSession');
Route::post('/login/employee', 'SessionsController@storeEmployeeSession');
Route::get('/logout', 'SessionsController@destroy');

//Employee
Route::get('/employee','EmployeesController@index')->name('employee');

//Manager
Route::get('/manager','ManagersController@index')->name('manager');
Route::get('/manager/register/employee', 'RegistrationController@createEmployee');
Route::post('/register/employee', 'RegistrationController@storeEmployee');
Route::get('/manager/createLeaveType', 'LeavesController@createLeaveType');
Route::post('/createLeaveType', 'LeavesController@storeLeaveType');
Route::get('/manager/updateLeaveType', 'LeavesController@updateLeaveTypeForm');
Route::get('/manager/reloadLeaveTypes', 'LeavesController@reloadLeaveTypes');
Route::post('/updateLeaveType/{type}', 'LeavesController@updateLeaveType');
Route::get('/deleteLeaveType/{type}', 'LeavesController@destroyLeaveType');
Route::post('/updateApplication/{id}', 'LeavesController@updateLeaveStatus');

//Leave
Route::get('/leave/apply', 'LeavesController@leaveApplication');
Route::post('/leave/apply', 'LeavesController@storeApplication');
