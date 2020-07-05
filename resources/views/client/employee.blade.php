@extends('client.layouts.employee_layout')

@section('content')

    <div>
                <div class="appraisal-form">
                    <div class="content">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="row">
                                    {!! Form::open(['route' => 'client.emp_appraise.store']) !!}

                                    @include('client.partials.fields')

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

