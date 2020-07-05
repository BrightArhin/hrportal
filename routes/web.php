<?php

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
//  $first_names = DB::table('employees')->pluck('first_name');
//      foreach($first_names as $name){
//        echo $name
//      }
//    $employees = DB::table('employees')
//        ->join('departments', 'employees.department_id', '=', 'departments.id')
//    ->select('employees.first_name', 'departments.*')->get();
//    dd($employees);
//    $user = DB::table('employees')->where('first_name','like','S%')->get();
//    dd($user);
//    $users = DB::table('employees')->whereNull('supervisor_id')->orWhere(function($query){
//        $query->where('first_name','Sammy')->whereEmployeeId(1);
//    })->get();
//    dd($users);
//    $user = DB::table('employees')->where([
//        ['first_name','Sammy'],
//        ['employee_id', 1]
//    ])->get();
//    dd($user);
//    $users = DB::table('employees')->latest('employee_id')->value('first_name');
//    dd($users);
//    $users = DB::table('employees')->inRandomOrder()->value('first_name');
//    dd($users);
//    $query = DB::table('employees')->orderBy('birth_date');
//
//  $reOrdered=$query->reorder('birth_date', 'asc')->get();
//  dd($reOrdered);

//  $employees = \App\Models\Employee::whereNull('supervisor_id')->with('employees')->get();
//  return $employees;
// foreach ($employees->supervisors as $supervisor){
//     return $supervisor->first_name;
// }
////  $array = [];
//  foreach ($employees as $employee){
//      $employee->supervisors()->attach($employees->random(rand(1,3))->pluck('employee_id')->toArray());
//  }

//    $employee = \App\Models\Employee::whereEmployeeId(2)->first();
//    $appraisal = new \App\Models\Appraisal();
//
//    $appraisal->supervisor_id = $employee['supervisor_id'];
//    $appraisal->date_of_appraisal = \Carbon\Carbon::now();
////
////    $appraisal->save();
////   // $appraisal->create(['employee_id'=>$employee->employee_id, 'supervisor_id'=>$employee->supervisor_id, 'date_of_appraisal'=>\Carbon\Carbon::now()]);
////  $appraisal = $employee->appraisals()->save($appraisal);
////  return $appraisal;
////
//    function converter($object){
//        return (array)$object;
//    }
//    $table =DB::table('appraisals')
//        ->join('scores', 'appraisals.id', '=', 'scores.appraisal_id')
//        ->where('appraisal_id',1)
//        ->get();
//   return $table->implode('staff_score',' ,');

   $data = [
       [
       "name" => "Bright",
        "email" => 'bright@gmial.com'
    ],
       [
       "age" => "Samuel",
        "game" => "sabah@gmail.com"
    ]
   ];

//   return collect($data)->collapse()->map(function($item,$key){
//       return $item.$key;
//   });



//   $employee = \App\Models\Employee::whereEmployeeId(1)->first();
//
//   $employeeroles = $employee->load('roles');
//    return $employeeroles->roles->contains('name','Administrator');


////   return $employeeroles;
//   foreach ($employeeroles->roles as $role){
//       echo $role->name;
//   }





//   $department = \App\Models\Department::with('employees')->get();
//
////   foreach ($department->flatMap->employees as $employee){
////       echo $employee-> first_name;
////   }
//
//   return $department;
//
//   return $department->filter(function($item){
//      if ($item->name !== 'IS'){
//           return $item;
//       }
//      return null;
//   });

    $scores = [
        'staff_score_1' => 20, 'supervisor_score_1' => 30, 'kpi_id_1' => 1,
        'staff_score_2' => 10, 'supervisor_score_2' => 100, 'kpi_id_2' => 2,
        'staff_score_3' => 120, 'supervisor_score_3' => 90, 'kpi_id_3' => 3,
        'staff_score_4' => 70, 'supervisor_score_4' => 38, 'kpi_id_4' => 4,
        'staff_score_5' => 120, 'supervisor_score' => 39, 'kpi_id_5' => 5
    ];
//    $appraisal = \App\Models\Appraisal::find(1);
//    $appraisal->scores()->createMany($scores);

//
////     $employee = \App\Models\Employee::whereEmployeeId(2)->with('appraisals')->first();
////      $appraisal = $employee->appraisals()->create(['supervisor_id'=>$employee->supervisor_id, 'date_of_appraisal'=>\Carbon\Carbon::now()]);
////      return $appraisal;

//     foreach ($result->appraisals as $appraisal){
//         dd $appraisal;
//     }
     //return $result;

//    $employee = \App\Models\Employee::whereEmployeeId(2)->with('appraisals.scores')->get();
//    return $employee;
//    $employee =  \App\Models\Employee::whereEmployeeId(1)->first();
//
//    $employee->update(["rank_id"=>2]);
//    $employee->fresh()   ;
//
//
//    echo $employee->rank->name;
//    echo $employee->rank_id;
//
////$collection = collect(['Bright','Arhin','Kobina']);
////$chunks =$collection->countBy();
//////return $chunks;
//    $collection = collect([
//        ['name' => 'Sally'],
//        ['school' => 'Arkansas'],
//        ['age' => 28]
//    ]);
//
//    $flattened = $collection->flatMap(function ($values) {
//        foreach($values as $value){
//            return (array)$value;
//        }
//    });
//
//    return $flattened->all();
//    $employee = \App\Models\Employee::whereEmployeeId(2)->first();
//   $appraisal = $employee->appraisals()->create(['supervisor_id'=>$employee->supervisor_id, 'date_of_appraisal'=>\Carbon\Carbon::now()]);
//
//    $data = [
//        'staff_score_1' => 20,
//        'supervisor_score_1' => 30,
//        'kpi_id_1' => 1,
//        'staff_score_2' => 10,
//        'supervisor_score_2' => 100,
//        'kpi_id_2' => 2,
//        'staff_score_3' => 120,
//        'supervisor_score_3' => 90,
//        'kpi_id_3' => 3,
//        'staff_score_4' => 70,
//        'supervisor_score_4' => 38,
//        'kpi_id_4' => 4,
//        'staff_score_5' => 120,
//        'supervisor_score_5' => 39,
//        'kpi_id_5' => 5
//    ];
//
//    $scores = new \App\Models\Score($data);
//
//    $appraisal->scores()->save($scores);

//    $employee = Auth::user()->load('worksIn');
//    $department =$employee->worksIn()->with('kpis')->first();
//    return $department;
//    $department =$employee->worksIn()->with('kpis')->first();
//
//    foreach ($department->kpis as $kpi){
//        echo $kpi->name;
//    }

//    $employee = Employee::whereEmployeeId(1)->first();
//    dd( $employee->appraisals());
//
//  if ( Auth::user()->role->name != 'Officer'){
//     $employees = Auth::user()->load(['employees.appraisals' => function($query){
//         $query->where('status', 'Pending');
//     }]);
//
//     $emp= $employees->employees->map(function($item){
//        return $item;
//     });
//
//     $appraisals =  $emp->flatMap(function($item){
//         return $item->appraisals->all();
//     });
    $employee = Employee::whereEmployeeId(4)->first();
//
//   return count($employee->employees);
 $app = Auth::user()->appraisals()->whereStatus('Evaluated')->first();
// return \Carbon\Carbon::parse( $app->date_of_appraisal)->toRfc7231String();
//    return view('client.dashboards.employee');

//     foreach ($emp as $employee){
//         return $employee->appraisals->map(function($item){
//             return $item;
//         });
//     }

//  }

//  $employee = Auth::user()->with('employees')->first();
//
//  return $employee;

////return Auth::user();
// $users = Auth::user()->load(['employees.appraisals'=> function ($query){
//       $query->whereStatus('Pending');
//   }]);
//
// return count($users->employees->flatMap->appraisals);
    return \Carbon\Carbon::now();


  return   \App\Models\Kpi::find(1)->name;



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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('employeeScores', 'EmployeeScoreController', ["as" => 'admin']);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('supervisorScores', 'SupervisorScoreController', ["as" => 'admin']);
});


