@extends('client.layouts.app')

@section('content')

    <div>



        <div class="container">

        <div class="container table-information">
            <h2 style=" margin-top :10px; align-self: flex-start">Employees to Yet Appraise</h2>

            <table class="table" style="margin-top: 10px">
                <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($appraisals)
                @foreach($appraisals  as $appraisal)
                    <tr>
                        <td>{{$appraisal->employee->first_name.' '.$appraisal->employee->last_name}}</td>
                        <td><a href={{route('employee_form',['id'=>$appraisal->id] )}} class="link"><button class="btn btn-info">Appraise</button></a></td>
                    </tr>
                @endforeach
                    @endif

                </tbody>
            </table>

        </div>

    </div>
@endsection

