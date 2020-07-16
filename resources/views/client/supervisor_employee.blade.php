@extends('client.layouts.appraisal')

@section('content')



                                <div >
                                    {!! Form::open(['route' => 'store_appraisal']) !!}

                                    @include('client.partials.supervisor_employee_fields')

                                </div>

                                <h3 style=" margin-top: 30px">Overall Rating(After Appraisal Interview)</h3>

                                <div id="scoring" >
                                    <div  class="overall" style="margin-left: 0 ; margin-bottom: 30px">
                                        <div class="overall-content">
                                            <h5>Sum Total Rating</h5>
                                            <span id="total" ></span>
                                        </div>
                                        <div class="overall-content">
                                            <h5>Number of Key Result Areas(KRA)</h5>
                                            <span id="num"></span>
                                        </div>
                                        <div class="overall-content">
                                            <h5>Total Average Score(Total Rating/No.KRAs)</h5>
                                            <span style="color: red" id="avg"></span>
                                        </div>
                                    </div>
                                    <h3 style=" margin-top: 30px">RECOMMENDATION BY SUPERVISOR</h3>
                                    <table class="table-bordered" style="width: 50%; margin-top: 10px">
                                        <tbody>
                                        <tr>
                                            <td class="tcol">DOUBLE INCREMENT</td>
                                            <td class="tcol">3.5 TO 4.4</td>
                                            <td id="the_highest" class="tcol"></td>
                                        </tr>
                                        <tr>
                                            <td class="tcol">NORMAL INCREMENT</td>
                                            <td class="tcol">2.0 TO 3.4</td>
                                            <td id="the_between"  class="tcol"></td>
                                        </tr>
                                        <tr>
                                            <td class="tcol">NO INCREMENT</td>
                                            <td class="tcol">BELOW 2.0</td>
                                            <td id="the_lowest" class="tcol"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p style="margin-bottom: 30px ;margin-top: 10px">(<b>NOTE : </b>Above 4.5 - One may be recommended for promotion depending on availability of Vacancies)</p>

                                </div>

                                <button style="margin-bottom: 30px" type="button" id="result" class="btn btn-danger">Show Results</button>


                                <div class="row">
                                    <h3 style="margin-left: 20px">DEVELOPMENT/TRAINING NEEDS</h3>
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('development_prospects', 'What are his/her development prospects?') !!}
                                        {!! Form::textarea('development_prospects', null, ['class' => 'form-control', 'rows'=>'5']) !!}
                                    </div>

                                    <div class="form-group col-sm-12">
                                        {!! Form::label('require_training', 'Does he/she require any training? If so, specify the kind of training you recommend') !!}
                                        {!! Form::textarea('require_training', null, ['class' => 'form-control', 'rows'=>'5']) !!}
                                    </div>


                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('client.emp_appraise.index') }}" class="btn btn-default">Cancel</a>
                                    </div>




                                    {!! Form::close() !!}
                                </div>


@endsection

