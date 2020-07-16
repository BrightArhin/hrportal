@extends('client.layouts.dashboard')

@section('content')



        <div class="container">

            <div class="container table-information">
                @if($appraisals !== null)
                <h2 style=" margin-top :10px; align-self: flex-start">Your Completed Appraisals</h2>
                @else
                    <h2 style=" margin-top :10px; align-self: flex-start">You currently have no completed Appraisals</h2>
                @endif

                <table class="table" style="margin-top: 10px">
                    <thead>
                    <tr>
                        <th>Appraisal</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($appraisals as $appraisal)

                    <tr>
                        <td>{{\Carbon\Carbon::parse( $appraisal->date_of_appraisal)->isoFormat('MMMM, DD YYYY')}}</td>
                        <td>
                            <a href={{route('client.appraisal_details', ['id'=>$appraisal->id])}}><button class="btn btn-info" >View</button></a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>

                </div>
        </div>




@endsection

