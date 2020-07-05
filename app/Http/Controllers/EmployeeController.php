<?php

namespace App\Http\Controllers;

use App\Events\EmployeeSave;
use App\Events\EmployeeUpdate;
use App\Events\Trying;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Grade;
use App\Models\Job;
use App\Models\Location;
use App\Models\Qualification;
use App\Models\Rank;
use App\Models\Role;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Response;

class EmployeeController extends AppBaseController
{
    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Employee $employees */
        $employees = Employee::all();


        return view('admin.employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee.
     *
     *
     */
    public function create()
    {
        $roles = Role::get()->pluck('name', 'id');
        $departments = Department::get()->pluck('name', 'id');
        $qualifications = Qualification::get()->pluck('name', 'id');
        $locations = Location::get()->pluck('name', 'id');
        $ranks = Rank::get()->pluck('name', 'id');
        $jobs = Job::get()->pluck('name', 'id');
        $grades = Grade::get()->pluck('name', 'id');

        return view('admin.employees.create',
            compact(['roles', 'departments', 'locations', 'ranks', 'jobs', 'grades', 'qualifications']));
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();

        /** @var Employee $employee */
        $employee = Employee::create([
            'supervisor_id' => $input['supervisor_id'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'birth_date' => $input['birth_date'],
            'date_first_appointment' => $input['date_first_appointment'],
            'date_last_promotion' => $input['date_last_promotion'],
            'status' => $input['status'],
            'isAdmin'=> $input['isAdmin'],
            'grade_id' => $input['grade_id'],
            'location_id' => $input['location_id'],
            'department_id' => $input['department_id'],
            'qualification_id' => $input['qualification_id'],
            'rank_id' => $input['rank_id'],
            'job_id' => $input['job_id'],
            'role_id'=> $input['role_id']
        ]);

        if($employee->supervisor_id != null){
            $supervisor = Employee::whereEmployeeId($input['supervisor_id'])->first();

            $employee->supervisors()->attach($supervisor->employee_id);
            $employee->save();
        }


        Flash::success('Employee saved successfully.');

        return redirect(route('admin.employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        return view('admin.employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param int $id
     *
     *
     */
    public function edit($id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);
        $roles = Role::get()->pluck('name', 'id');
        $departments = Department::get()->pluck('name', 'id');
        $qualifications = Qualification::get()->pluck('name', 'id');
        $locations = Location::get()->pluck('name', 'id');
        $ranks = Rank::get()->pluck('name', 'id');
        $jobs = Job::get()->pluck('name', 'id');
        $grades = Grade::get()->pluck('name', 'id');


        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        return view('admin.employees.edit', compact(['employee', 'roles', 'departments', 'locations', 'ranks', 'jobs', 'grades', 'qualifications']));
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param int $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


         $employee->fill($input);

        if($employee->supervisor_id != null){
            $supervisor = Employee::whereEmployeeId($input['supervisor_id'])->first();

            $employee->supervisors()->attach($supervisor->employee_id);
            $employee->save();
        }






        Flash::success('Employee updated successfully.');

        return redirect(route('admin.employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var Employee $employee */
        $employee = Employee::find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('admin.employees.index'));
        }

        $employee->delete();

        Flash::success('Employee deleted successfully.');

        return redirect(route('admin.employees.index'));
    }
}
