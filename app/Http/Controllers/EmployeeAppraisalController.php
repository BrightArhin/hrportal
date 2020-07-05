<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class EmployeeAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $i=0;
        $employee = Auth::user()->load('department');
        $department =$employee->department()->with('kpis')->first();
        return view('client.employee', compact(['employee', 'department', 'i']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       $appraisal = Auth::user()->appraisals()->create(['supervisor_id'=>Auth::user()->supervisor_id,
           'date_of_appraisal'=>Carbon::now(), 'status'=>'Pending']);
       $appraisal->employeescores()->create($request->all());

        Flash::success('Appraisal created successfully.');

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($emp_appraise)
    {
        $appraisal = Appraisal::find($emp_appraise)->with('supervisorscores')->first() ;
         $supervisor_scores = $appraisal->supervisorscores()->first();
        $employee_scores = $appraisal->employeescores()->first();
         return view('client.dashboards.show_evaluated', compact(['supervisor_scores', 'employee_scores']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $emp_appraise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $emp_appraise)
    {
            $appraisal = Appraisal::find($emp_appraise);

            $appraisal->update(['status'=>'Completed']);

            return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchToBeApprovedAppraisals(){
        $appraisals = Auth::user()->appraisals()->whereStatus('Evaluated')->get();
        if($appraisals){
            return view('client.dashboards.approve', compact('appraisals'));
        }else{
           return redirect('/home');
        }

    }
}
