@extends('client.layouts.app')

@section('content')

    <div>



        <div class="container">

        <div class="container table-information">
            <h2 style=" margin-top :10px; align-self: flex-start">Your Appraisals Yet to be Approved</h2>

            <table class="table" style="margin-top: 10px">
                <thead>
                <tr>
                    <th>Appraisal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if($appraisals)
                @foreach($appraisals  as $appraisal)
                    <tr>
                        <td>{{\Carbon\Carbon::parse( $appraisal->date_of_appraisal)->toRfc7231String()}}</td>
                        <td><a href={{route('client.emp_appraise.show',['emp_appraise'=>$appraisal->id] )}} class="link"><button class="btn btn-info">View</button></a></td>
                    </tr>
                @endforeach
                    @endif

                </tbody>
            </table>

        </div>

    </div>
@endsection

