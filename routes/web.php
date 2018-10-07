<?php

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

//Admin
Route::get('/admin', 'AdminsController@index')->name('admin');
Route::get('/admin/register/manager', 'AdminsController@createManager');
Route::get('/admin/register/employee', 'AdminsController@createEmployee');
Route::post('/register/manager', 'RegistrationController@storeManager');
Route::post('/register/employee', 'RegistrationController@storeEmployee');
Route::get('/admin/update/managers', 'AdminsController@updateManagers');
Route::get('/admin/update/employees', 'AdminsController@updateEmployees');
Route::post('/update/manager/{username}', 'AdminsController@updateManager');
Route::post('/update/employee/{username}', 'AdminsController@updateEmployee');
Route::get('/delete/manager/{username}', 'AdminsController@destroyManager');
Route::get('/delete/employee/{username}', 'AdminsController@destroyEmployee');


//Manager
Route::get('/manager','ManagersController@index')->name('manager');
Route::get('/manager/createLeaveType', 'LeavesController@createLeaveType');
Route::post('/createLeaveType', 'LeavesController@storeLeaveType');
Route::get('/manager/updateLeaveType', 'LeavesController@updateLeaveTypeForm');
Route::get('/manager/reloadLeaveTypes', 'LeavesController@reloadLeaveTypes');
Route::post('/updateLeaveType/{type}', 'LeavesController@updateLeaveType');
Route::get('/deleteLeaveType/{type}', 'LeavesController@destroyLeaveType');
Route::post('/updateApplication/{id}/{username}', 'LeavesController@updateLeaveStatus');

//Employee
Route::get('/employee','EmployeesController@index')->name('employee');
Route::get('/delete/application/{id}', 'LeavesController@destroyLeave');

//Leave
Route::get('/leave/apply', 'LeavesController@leaveApplication');
Route::post('/leave/apply', 'LeavesController@storeApplication');
