<?php

namespace App\Http\Controllers;

use App\Events\SupervisorAppraised;
use App\Listener\UpdateAppraisalStatus;
use App\Models\Appraisal;
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
        $employee = Auth::user()->load('department');
        $department =$employee->department()->with('kpis')->first();
        $employees = Auth::user()->load(['employees.appraisals' => function($query){
            $query->where('status', 'Pending');
        }]);

        $emp= $employees->employees->map(function($item){
            return $item;
        });


        $appraisals =  $emp->flatMap(function($item){
            return $item->appraisals->all();
        });

//        dd($appraisals);

        return view('client.dashboards.evaluate', compact(['appraisals']));
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
        $appraisal =Appraisal::find($id)->load('employee');
        $employee = $appraisal->employee;
        $department =  $employee->department()->with('kpis')->first();
        $appraisal_id = $appraisal->id;
        return view('client.supervisor_employee', compact(['employee', 'department', 'i', 'appraisal_id']));
    }

    public function storeEmployeeAppraisal(Request $request){

        $appraisal = Appraisal::find($request->appraisal_id);
        $supScore = new SupervisorScore();
        $supScore->create($request->all());

        SupervisorAppraised::dispatch($appraisal);

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
