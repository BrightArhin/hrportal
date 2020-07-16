@extends('client.layouts.dashboard')

@section('content')


        <div class="container">

            <div class="container table-information">
                <h2 style=" margin-top :10px; align-self: flex-start">EVALUATION OF KEY RESULT AREAS/DUTIES</h2>

                <table class="table" style="margin-top: 30px">
                    <thead>
                    <tr>
                        <th>Key Point Indicator</th>
                        <th>Appraisee</th>
                        <th>Appraiser</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$employee_scores->kpi_1}}</td>
                        <td>{{$employee_scores->score_1}}</td>
                        <td>{{$supervisor_scores->score_1}}</td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_2}}</td>
                        <td>{{$employee_scores->score_2}}</td>
                        <td>{{$supervisor_scores->score_2}}</td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_3}}</td>
                        <td>{{$employee_scores->score_3}}</td>
                        <td>{{$supervisor_scores->score_3}}</td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_4}}</td>
                        <td>{{$employee_scores->score_4}}</td>
                        <td>{{$supervisor_scores->score_4}}</td>
                    </tr>
                    <tr>
                        <td>{{$employee_scores->kpi_5}}</td>
                        <td>{{$employee_scores->score_5}}</td>
                        <td>{{$supervisor_scores->score_5}}</td>
                    </tr>

                    </tbody>
                </table>

                <h3 style="margin-left: 10px; margin-top: 30px">Overall Rating(After Appraisal Interview)</h3>

                <div class="overall">
                    <div class="overall-content">
                        <h5>Sum Total Rating</h5>
                        <span>{{$sumScores}}</span>
                    </div>
                    <div class="overall-content">
                        <h5>Number of Key Result Areas(KRA)</h5>
                        <span>5</span>
                    </div>
                    <div class="overall-content">
                        <h5>Total Average Score(Total Rating/No.KRAs)</h5>
                        <span style="color: red">{{$avg}}</span>
                    </div>
                </div>

                <h4 style="margin-left:10px; margin-top: 30px">RECOMMENDATION BY SUPERVISOR</h4>
                @switch($avg)
                    @case ($avg  >= 3.5)
                        <table class="table-bordered" style="width: 50%; margin-left: 10px; margin-top: 10px">
                            <tbody>
                            <tr>
                                <td class="tcol">DOUBLE INCREMENT</td>
                                <td class="tcol">3.5 TO 4.4</td>
                                <td class="tcol">&#10004;</td>
                            </tr>
                            <tr>
                                <td class="tcol">NORMAL INCREMENT</td>
                                <td class="tcol">2.0 TO 3.4</td>
                                <td class="tcol"></td>
                            </tr>
                            <tr>
                                <td class="tcol">NO INCREMENT</td>
                                <td class="tcol">BELOW 2.0</td>
                                <td class="tcol"></td>
                            </tr>
                            </tbody>
                        </table>
                        @break
                    @case ($avg >= 2.0 && $avg <= 3.4)
                    <table class="table-bordered" style="width: 50%; margin-left: 10px; margin-top: 10px">
                        <tbody>
                        <tr>
                            <td class="tcol">DOUBLE INCREMENT</td>
                            <td class="tcol">3.5 TO 4.4</td>
                            <td class="tcol"></td>
                        </tr>
                        <tr>
                            <td class="tcol">NORMAL INCREMENT</td>
                            <td class="tcol">2.0 TO 3.4</td>
                            <td class="tcol">&#10004;</td>
                        </tr>
                        <tr>
                            <td class="tcol">NO INCREMENT</td>
                            <td class="tcol">BELOW 2.0</td>
                            <td class="tcol" ></td>
                        </tr>
                        </tbody>
                    </table>
                    @break
                    @case ($avg < 2.0)
                    <table class="table-bordered" style="width: 50%; margin-left: 10px; margin-top: 10px">
                        <tbody>
                        <tr>
                            <td class="tcol">DOUBLE INCREMENT</td>
                            <td class="tcol">3.5 TO 4.4</td>
                            <td class="tcol"></td>
                        </tr>
                        <tr>
                            <td class="tcol">NORMAL INCREMENT</td>
                            <td class="tcol">2.0 TO 3.4</td>
                            <td class="tcol"></td>
                        </tr>
                        <tr>
                            <td class="tcol">NO INCREMENT</td>
                            <td class="tcol">BELOW 2.0</td>
                            <td class="tcol">&#10004;</td>
                        </tr>
                        </tbody>
                    </table>
                    @break
                    @default

                    <table class="table-bordered" style="width: 50%; margin-left: 10px; margin-top: 10px">
                        <tbody>
                        <tr>
                            <td>DOUBLE INCREMENT</td>
                            <td>3.5 TO 4.4</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>NORMAL INCREMENT</td>
                            <td>2.0 TO 3.4</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>NO INCREMENT</td>
                            <td>BELOW 2.0</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>



                @endswitch

                <p style="margin: 20px 10px">(<b>NOTE : </b>Above 4.5 - One may be recommended for promotion depending on availability of Vacancies)</p>

                <div class="buttons" >

                    <form method="POST"  action={{route('client.emp_appraise.update', ['emp_appraise'=>$supervisor_scores->appraisal_id])}}>
                        <button  type=submit class="btn btn-success">Approve</button>
                        @csrf
                        {{ method_field('PUT') }}
                    </form>

                    <button onclick="toggleCommentBox()"  type=submit class="btn btn-danger ">
                        Disapprove
                    </button>
                </div>


                <form id="comment-form" action="{{ route('client.comment.store') }}" method="POST"
                      style="display:none; margin-top: 20px">
                    @csrf
                    <div class="form-group">
                        <label for="comment">State why you disapprove</label>
                        <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
                        <button style="margin-top: 10px" type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <input type="hidden" name="appraisal_id" value="{{$supervisor_scores->appraisal_id}}">
                </form>
            </div>
        </div>


        <script>
            let show = false

            function toggleCommentBox() {
                show = !show;
                if (show) {
                    document.getElementById("comment-form").style.display = "block";
                    document.getElementById("comment").focus();

                } else {
                    document.getElementById("comment-form").style.display = "none";
                }
            }
        </script>
@endsection

