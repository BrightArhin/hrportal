<?php

namespace App\Http\Controllers;

use App\Events\AppraisalCompleteEvent;
use App\Models\Appraisal;
use App\Models\EmployeeComment;
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
     * @param $emp_appraise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($emp_appraise)
    {

        $appraisal = Appraisal::whereId($emp_appraise)->with('supervisorscores')->first() ;
         $supervisor_scores = $appraisal->supervisorscores()->first();
         $sumScores = $supervisor_scores->score_1+$supervisor_scores->score_2+
                      $supervisor_scores->score_4+$supervisor_scores->score_4+
                      $supervisor_scores->score_5;
         $avg = $sumScores/5;
        $employee_scores = $appraisal->employeescores()->first();
         return view('client.dashboards.show_evaluated', compact(['supervisor_scores', 'employee_scores', 'sumScores', 'avg']));
    }


    public function showdisapproval($emp_appraise){
        $appraisals = Appraisal::whereId($emp_appraise)->whereStatus('Disapproved')->with('supervisorscores')->get() ;
        return $appraisals;
        $comment = EmployeeComment::where('appraisal_id', $appraisal->id);
        $supervisor_scores = $appraisal->supervisorscores()->first();
        $employee_scores = $appraisal->employeescores()->first();
        return view('client.dashboards.disapproved',compact(['supervisor_scores', 'employee_scores', 'comment']));
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
//            $appraisal->status = 'Completed';
//
//            $appraisal->save();
             AppraisalCompleteEvent::dispatch($appraisal);


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
        $appraisal = Auth::user()->appraisals()->whereStatus('Evaluated')->first();

            return view('client.dashboards.approve', compact('appraisal'));


    }

    public function getDisapprovedAppraisals(){
        $appraisals = Auth::user()->appraisals()->whereStatus('Disapproved')->with('supervisorscores', 'employeescores')->get();
            return view('client.dashboards.disapproved', compact('appraisals'));


    }

    public function getApprovedAppraisals(){
        $appraisals = Auth::user()->appraisals()->whereStatus('Completed')->with('supervisorscores', 'employeescores')->get();
        return view('client.dashboards.approved', compact('appraisals'));


    }

    public function appraisalDetails($id){
        $appraisal = Appraisal::whereId($id)->first();
        $appraisal->load('employeescores', 'supervisorscores', 'comment.employee_comment');
        $employee_scores = $appraisal->employeescores;
        $supervisor_scores = $appraisal->supervisorscores;
        $sumScores = $supervisor_scores->score_1+$supervisor_scores->score_2+
            $supervisor_scores->score_4+$supervisor_scores->score_4+
            $supervisor_scores->score_5;
        $avg = $sumScores/5;
        $comment =$appraisal->comment->filter(function($comment){
            if($comment->employee_comment !== null ){
                return $comment;
            }
        });

        return view('client.dashboards.disapproved_details', compact(['employee_scores','supervisor_scores',
            'sumScores', 'avg', 'comment']));
    }

}
