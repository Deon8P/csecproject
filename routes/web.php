<?php

//Email Verification Route
//Auth::routes(['verify' => true]);

//Home
Route::get('/home', 'UsersController@checkRole');

//Register
Route::get('/register', 'RegistrationController@index');
Route::post('/register/admin', 'RegistrationController@storeAdmin');

//Sessions
Route::get('/', 'SessionsController@create');
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login/admin', 'SessionsController@storeAdminSession');
Route::post('/login/manager', 'SessionsController@storeManagerSession');
Route::post('/login/employee', 'SessionsController@storeEmployeeSession');
Route::get('/logout', 'SessionsController@destroy');

//Admin->Managers
Route::get('/admin', 'AdminsController@index')->name('admin');
Route::get('/admin/register/manager', 'AdminsController@createManager');
Route::post('/register/manager', 'RegistrationController@storeManager');
Route::get('/admin/update/managers', 'AdminsController@updateManagers');
Route::post('/update/manager/{username}', 'AdminsController@updateManager');
Route::post('/delete/manager/{username}', 'AdminsController@destroyManager');

//Admin->Employees
Route::get('/admin/register/employee', 'AdminsController@createEmployee');
Route::post('/register/employee', 'RegistrationController@storeEmployee');
Route::get('/admin/update/employees', 'AdminsController@updateEmployees');
Route::post('/update/employee/{username}', 'AdminsController@updateEmployee');
Route::get('/delete/employee/{username}', 'AdminsController@destroyEmployee');

//Admin->LeaveTypes
Route::get('/admin/createLeaveType', 'LeavesController@createLeaveType');
Route::post('/createLeaveType', 'LeavesController@storeLeaveType');
Route::get('/admin/updateLeaveType', 'LeavesController@updateLeaveTypeForm');
Route::post('/updateLeaveType/{type}', 'LeavesController@updateLeaveType');
Route::get('/deleteLeaveType/{type}', 'LeavesController@destroyLeaveType');
Route::get('/admin/reloadLeaveTypes', 'LeavesController@reloadLeaveTypes');

//Manager
Route::get('/manager','ManagersController@index')->name('manager');
Route::post('/updateApplication/{id}/{username}', 'LeavesController@updateLeaveStatus');
Route::get('/manager/application/history', 'ManagersController@applicationHistory');

//Employee
Route::get('/employee','EmployeesController@index')->name('employee');
Route::get('/delete/application/{id}', 'LeavesController@destroyLeave');

//Leave
Route::get('/leave/apply', 'LeavesController@leaveApplication');
Route::post('/leave/apply', 'LeavesController@storeApplication');
