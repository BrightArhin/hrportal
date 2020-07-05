@extends('client.layouts.supervisor_layout')

@section('content')

    <div>
                <div class="appraisal-form">
                    <div style="display: flex; justify-content: space-between">
                    <div class="content" style="width: 100%">
                        <div class="box box-primary" >
                            <div class="box-body">
                                <div class="row">
                                    {!! Form::open(['route' => 'client.emp_appraise.store']) !!}

                                    @include('client.partials.fields')

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content" style="width: 90%">
                        <div class="box box-primary" style="width: 90%">
                            <div class="box-body">
                                <div class="row">
                                    <h4 style="text-align: center">Employees To Appraise</h4>
                                    <ul style="list-style-type: none">
                                        @foreach($appraisals as $appraisal)
                                            <li style="text-align: center"><a href={{route('employee_form',['id'=>$appraisal->id])}}>{{$appraisal->employee->first_name.' '.$appraisal->employee->last_name}}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

    </div>

@endsection

