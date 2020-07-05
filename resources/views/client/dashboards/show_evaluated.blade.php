@extends('client.layouts.app')

@section('content')

    <div>
        <div class="container">

            <div class="container table-information">
                <h2 style=" font-weight:bold; margin-top :10px; align-self: flex-start">Scores from Your Supervisor</h2>

                <table class="table" style="margin-top: 30px">
                    <thead>
                    <tr>
                        <th>Key Point Indicator</th>
                        <th>Your Score</th>
                        <th>Supervisor Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{\App\Models\Kpi::find($supervisor_scores->kpi_id_1)->name}}</td>
                        <td>{{$employee_scores->score_1}}</td>
                        <td>{{$supervisor_scores->score_1}}</td>
                    </tr>
                    <tr>
                        <td>{{\App\Models\Kpi::find($supervisor_scores->kpi_id_2)->name}}</td>
                        <td>{{$employee_scores->score_2}}</td>
                        <td>{{$supervisor_scores->score_2}}</td>
                    </tr>
                    <tr>
                        <td>{{\App\Models\Kpi::find($supervisor_scores->kpi_id_3)->name}}</td>
                        <td>{{$employee_scores->score_3}}</td>
                        <td>{{$supervisor_scores->score_3}}</td>
                    </tr>
                    <tr>
                        <td>{{\App\Models\Kpi::find($supervisor_scores->kpi_id_4)->name}}</td>
                        <td>{{$employee_scores->score_4}}</td>
                        <td>{{$supervisor_scores->score_4}}</td>
                    </tr>
                    <tr>
                        <td>{{\App\Models\Kpi::find($supervisor_scores->kpi_id_5)->name}}</td>
                        <td>{{$employee_scores->score_5}}</td>
                        <td>{{$supervisor_scores->score_5}}</td>
                    </tr>

                    </tbody>
                </table>
                <div class="buttons">

                    <form method="POST"  action={{route('client.emp_appraise.update', ['emp_appraise'=>$supervisor_scores->appraisal_id])}}>
                        <button type=submit class="btn btn-success">Approve</button>
                        @csrf
                        {{ method_field('PUT') }}
                    </form>

                    <button onclick="toggleCommentBox()" style='margin-left: 60%' type=submit class="btn btn-danger pull-right">
                        Disapprove
                    </button>
                </div>


                <form id="comment-form" action="{{ route('client.comment.store') }}" method="POST"
                      style="display:none; margin-top: 20px">
                    @csrf
                    <div class="form-group">
                        <label for="comment">State why you disapprove</label>
                        <textarea class="form-control" rows="5" id="comment" name="body"></textarea>
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

                } else {
                    document.getElementById("comment-form").style.display = "none";
                }
            }
        </script>
@endsection

