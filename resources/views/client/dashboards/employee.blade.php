@extends('client.layouts.app')

@section('content')

    <div class="d-container">

        <div class="d-wrapper">
            <a href="" class="link">
                <div class="item" style="background-color: #f8bbd0">
                    <div class="item-content">
                        <p class="content-text">Your Approved Appraisals</p>
                        <span class="content-text" style="font-size: 24px">
                            {{
                                count(Auth::user()->load(['appraisals'=> function ($query){
                                   $query->whereStatus('Completed');
                               }])->appraisals)
                            }}
                        </span>
                    </div>
                </div>
            </a>
            <a href={{route('client.approval')}} class="link">
                <div class="item" style="background-color: #80deea">
                    <div class="item-content">
                        <p class="content-text">Appraisals Pending Your Approval</p>
                        <span class="content-text" style="font-size: 24px">
                             {{
                                count(Auth::user()->load(['appraisals'=> function ($query){
                                   $query->whereStatus('Evaluated');
                               }])->appraisals)
                            }}
                        </span>
                    </div>
                </div>
            </a>

            <a href={{route('client.disapproved')}} class="link">
                <div class="item" style="background-color: #f44336">
                    <div class="item-content">
                        <p class="content-text">Disapproved Appraisals</p>
                        <span class="content-text" style="font-size: 24px">

                        </span>
                    </div>
                </div>
            </a>

            <div class="item" style="background-color: #c5e1a5">
                <div class="item-content">
                    <p class="content-text">Appraisals To be evaluated by your Supervisor</p>
                    <span class="content-text" style="font-size: 24px">
                         {{
                                count(Auth::user()->load(['appraisals'=> function ($query){
                                   $query->whereStatus('Pending');
                               }])->appraisals)
                            }}
                    </span>
                </div>
            </div>

            @if(count(Auth::user()->employees) > 0)
                <a class="link"
                   href={{ route('client.sup_appraise.index')}} >
                    <div class="item">
                        <div class="item-content">
                            <p>You have
                                <span class="content-text"
                                      style="font-size: 24px; font-weight: bold; color: red; opacity: 1">
                                @php
                                    $employees = Auth::user()->load(['employees.appraisals'=> function ($query){
                                        $query->whereStatus('Pending');
                                    }]);

                                    if($employees){
                                      echo count($employees->employees->flatMap->appraisals) ;
                                    }else{
                                        echo 0;
                                    }

                                @endphp
                            </span>new appraisals to Evaluate </p>
                        </div>
                    </div>
                </a>
            @endif
            <a class="link"
               href={{asset('docs/policy.pdf')}} >
                <div class="item" style="background-color: #bdbdbd">
                    <div class="item-content">
                        <p>Cocobod Policy Guidelines</p>
                        <span class="content-text"
                              style="font-size: 24px; font-weight: bold; color: limegreen">&#x270d;</span>
                    </div>
                </div>
            </a>
            <?php

            use App\Models\Appraisal;
            $appraisal = Appraisal::whereEmployeeId(Auth::user()->employee_id)->latest()->first();

            if ($appraisal) {
                if ($appraisal->status == 'Completed' || $appraisal->status == 'Disapproved') {
                    $the_appraisal = <<<apps
               <a class="link"
               href='client/emp_appraise'>
                <div class="item">
                    <div class="item-content">
                        <p>Appraise Yourself </p>
                        <span class="content-text"
                              style="font-size: 24px; font-weight: bold; color: limegreen">&#10141;</span>
                    </div>
                </div>
            </a>
apps;
                    echo $the_appraisal;

                }
            } else {
                $second = <<<apps
               <a class="link"
               href='client/emp_appraise'>
                <div class="item">
                    <div class="item-content">
                        <p>Appraise Yourself </p>
                        <span class="content-text"
                              style="font-size: 24px; font-weight: bold; color: limegreen">&#10141;</span>
                    </div>
                </div>
            </a>
apps;
                echo $second;
            }





            ?>

        </div>
    </div>


@endsection

<!-- Top right Link -->


