<?php

namespace App\Http\Controllers;

use App\Events\AppraisalEvaluatedEvent;
use App\Events\SupervisorAppraised;
use App\Listener\UpdateAppraisalStatus;
use App\Models\Appraisal;
use App\Models\Comment;
use App\Models\SupervisorScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorAppraisalController extends Controller
{

    public function __construct()
    {
        $this->middleware('isSupervisor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $i=0;
        if(Auth::user()){
            $employee = Auth::user()->load('department');
            $department =$employee->department()->with('kpis')->first();
            $employees = Auth::user()->load(['employees.appraisals' => function($query){
                $query->where('status', 'Pending')->orderBy('created_at', 'desc');
            }]);

            $emp= $employees->employees->map(function($item){
                return $item;
            });


            $appraisals =  $emp->flatMap(function($item){
                return $item->appraisals->all();
            });

//        dd($appraisals);

            return view('client.dashboards.evaluate', compact(['appraisals', 'department', 'i']));
        }
        return redirect('/');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function getEmployeeAppraisalForm($id){
        $i=0;
        $appraisal =Appraisal::find($id)->load('employee','employeescores');
        $employeescores = $appraisal->employeescores;
        $employee = $appraisal->employee;
        $appraisal_id = $appraisal->id;
        return view('client.supervisor_employee', compact(['employee', 'appraisal_id', 'employeescores']));
    }

    public function storeEmployeeAppraisal(Request $request){

        $appraisal = Appraisal::find($request->appraisal_id);
        if($request->development_prospects !=  '' || $request->require_training !=  ''){
            $comment = $appraisal->comment()->create();
            $comment->supervisor_comment()->create(['development_prospects'=>$request->development_prospects,
                'require_training'=>$request->require_training]);
        }

        $supScore = new SupervisorScore();
        $supScore->create($request->except(['development_prospect', 'require_training']));

        AppraisalEvaluatedEvent::dispatch($appraisal);

        return redirect('client/sup_appraise ');
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
}
