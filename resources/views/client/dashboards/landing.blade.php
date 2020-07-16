@extends('client.layouts.homer')


@section('content')

    <div class="cards-container">

        <a href={{route('client.approved')}} class="link">
            <div class="card">
                <div class="card-header">
                    Completed Appraisals
                </div>
                <div class="card-body">
                    <h2 class="number">{{$approved}}</h2>
                </div>
                <div class="card-footer text-muted" style="background-color: #2196f3; height: 30px">
                </div>
            </div>
        </a>


        <a href={{route('client.disapproved')}} class="link">

            <div class="card">
                <div class="card-header">
                    Disapproved Appraisals
                </div>
                <div class="card-body">
                    <h2 class="number">
                        {{$disapproved}}
                    </h2>
                </div>
                <div class="card-footer text-muted" style="background-color:#ff1744 ; height: 30px">
                </div>
            </div>
        </a>


        <div class="card">
            <div class="card-header">
                Pending Evaluation
            </div>
            <div class="card-body">
                <h2 class="number">
                    {{$pendingEvaluation}}
                </h2>

            </div>
            <div class="card-footer text-muted" style="background-color:#ea80fc ; height: 30px">
            </div>
        </div>

        <a href={{route('client.approval')}} >
        <div class="card">
            <div class="card-header">
                Pending Your Approval
            </div>
            <div class="card-body">
                <h2 class="number">
                    {{$pendingMyApproval}}
                </h2>
            </div>
            <div class="card-footer text-muted" style="background-color: yellow; height: 30px">
            </div>
        </div>
        </a>

        @if(count(Auth::user()->employees) > 0)
            <a class="link" href={{ route('client.sup_appraise.index')}} >
                <div class="card">
                    <div class="card-header">
                        Employees To Evaluate
                    </div>
                    <div class="card-body">
                        <h2 class="number">
                            {{$newToEval}}
                        </h2>
                    </div>
                    <div class="card-footer text-muted" style="background-color: #18ffff; height: 30px">
                    </div>
                </div>
            </a>
        @endif

        @if ($appraisal)
            @if ($appraisal->status == 'Completed' || $appraisal->status == 'Disapproved')
                <a  href='client/emp_appraise'>
                    <div class="card">
                        <div class="card-header">
                            Appraise Yourself
                        </div>
                        <div class="card-body">
                            <h2 class="number" style="color: #76ff03">&#10141;</h2>
                        </div>
                        <div class="card-footer text-muted" style="background-color:#76ff03; height: 30px">
                        </div>
                    </div>
                </a>
            @endif
        @else
            <a href='client/emp_appraise'>
                <div class="card">
                    <div class="card-header">
                        Appraise Yourself
                    </div>

                    <div class="card-body">
                        <h2 class="number" style="color: #76ff03">&#10141;</h2>
                    </div>

                    <div class="card-footer text-muted" style="background-color:#76ff03; height: 30px">
                    </div>
                </div>
            </a>

        @endif

    </div>
@endsection
