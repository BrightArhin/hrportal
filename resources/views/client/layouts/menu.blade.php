
    <h4 class="detail-label" style="margin-left: 20px">Name:</h4>
    <p style="margin-left:20px; color: black; opacity: 42%">{{$employee->full_name}}</p>

    <h4 class="detail-label" style="margin-left: 20px">Status:</h4>
    <p class="" style="margin-left:20px; color: black; opacity: 42%">{{$employee->status}}</p>

    <h4 class="detail-label" style="margin-left: 20px">Department:</h4>
    <p class="" style="margin-left:20px; color: black; opacity: 42%">{{$employee->department->name}}</p>

    <h4 class="detail-label" style="margin-left: 20px">Location:</h4>
    <p class="" style="margin-left:20px; color: black; opacity: 42%;">{{$employee->location->name}}</p>


    <h4 class="detail-label" style="margin-left: 20px">Qualification:</h4>
    <p class="" style="margin-left:20px; color: black; opacity: 42%">{{$employee->qualification->name}}</p>


    <h4 class="detail-label" style="margin-left: 20px">Rank:</h4>
    <p class="" style="margin-left:20px; color: black; opacity: 42%">{{$employee->rank->name}}</p>


    <h4 class="detail-label" style="margin-left: 20px">Job:</h4>
    <p class="" style="margin-left:20px; color: black; opacity: 42%">{{$employee->job->name}}</p>



