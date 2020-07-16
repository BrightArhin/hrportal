<?php

use App\Mail\AppraisalMail;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//
//Route::view('/client/{path?}', 'react');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware(['verified']);


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employees', 'EmployeeController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('roles', 'RoleController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('kpis', 'KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('departments', 'DepartmentController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('comments', 'CommentController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('appraisals', 'AppraisalController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('qualifications', 'QualificationController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('ranks', 'RankController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('locations', 'LocationController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('grades', 'GradeController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('jobs', 'JobController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('scores', 'ScoreController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employeeEmployees', 'Employee_EmployeeController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employeeRoles', 'Employee_RoleController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('departmentKpis', 'Department_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('kpiRoles', 'Kpi_RoleController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('departmentKpis', 'Department_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('appraisalKpis', 'Appraisal_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('appraisalKpis', 'Appraisal_KpiController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employeeEmployees', 'Employee_EmployeeController', ["as" => 'admin']);
});


Route::get('get', function () {
    Mail::to('barhin49@gmail.com')->send(new AppraisalMail());
    return new AppraisalMail();
});

Route::group(['prefix'=>'client'],function(){
    Route::resource('comment', 'EmployeeCommentController', ["as"=>'client']);
});

Route::get('admin/home', function(){
    return view('home');
})->name('admin.home')->middleware('isAdmin');

Route::get('client.approval', 'EmployeeAppraisalController@fetchToBeApprovedAppraisals' )->name('client.approval');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('scoreKpis', 'Score_KpiController', ["as" => 'admin']);
});

Route::group(['prefix'=>'client'],function(){
    Route::resource('emp_appraise', 'EmployeeAppraisalController', ["as"=>'client']);
});

Route::group(['prefix'=>'client'],function(){
    Route::resource('sup_appraise', 'SupervisorAppraisalController', ["as"=>'client']);
});

Route::get('client/sup_appraise/getForm/{id}', 'SupervisorAppraisalController@getEmployeeAppraisalForm')->name('employee_form');
Route::post('client/sup_appraise/storeEmployeeAppraisal/', 'SupervisorAppraisalController@storeEmployeeAppraisal')->name('store_appraisal');
Route::get('client/disapproved', 'EmployeeAppraisalController@getDisapprovedAppraisals')->name('client.disapproved');
Route::get('client/approved', 'EmployeeAppraisalController@getApprovedAppraisals')->name('client.approved');
Route::get('client/appraisal_details/{id}', 'EmployeeAppraisalController@appraisalDetails')->name('client.appraisal_details');
Route::get('/about', function (){
    return view('client.about');
})->middleware('auth');
Route::get('/profile', function (){
    return view('client.profile');
})->middleware('auth')->name('profile');
Route::get('/policy', function(){
    return view('client.policy');
})->name('policy');

Route::patch('/password_change', 'EmployeeController@changePassword')->name('change_password');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employeeScores', 'EmployeeScoreController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('supervisorScores', 'SupervisorScoreController', ["as" => 'admin']);
});


