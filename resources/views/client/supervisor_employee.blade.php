@extends('client.layouts.employee_layout')

@section('content')

    <div>
                <div class="appraisal-form">
                    <div class="content">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="row">
                                    {!! Form::open(['route' => 'store_appraisal']) !!}

                                    @include('client.partials.supervisor_employee_fields')

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

