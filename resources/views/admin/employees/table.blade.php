<div class="table-responsive">
    <table class="table" id="employees-table">
        <thead>
        <tr>
            <th>Employee Id</th>
            <th>Supervisor Id</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Birth Date</th>
            <th>Date First Appointment</th>
            <th>Date Last Promotion</th>
            <th>Status</th>
            <th>isAdmin</th>
            <th>Location</th>
            <th>Department</th>
            <th>Qualification</th>
            <th>Grade</th>
            <th>Rank</th>
            <th>Job</th>
            <th>Role</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->employee_id }}</td>
                <td>{{ $employee->supervisor_id }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->middle_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->password }}</td>
                <td>{{ $employee->birth_date }}</td>
                <td>{{ $employee->date_first_appointment }}</td>
                <td>{{ $employee->date_last_promotion }}</td>
                <td>{{ $employee->status }}</td>
                <td>{{ $employee->isAdmin }}</td>

                <td>@if($employee->location)
                        {{ $employee->location->name }}
                    @else
                        {{''}}
                    @endif

                </td>
                <td>@if($employee->department)
                        {{ $employee->department->name }}
                    @else
                        {{''}}
                    @endif
                </td>
                <td>@if($employee->qualification)
                        {{ $employee->qualification->name }}
                    @else
                        {{''}}
                    @endif</td>
                <td>@if($employee->grade)
                        {{ $employee->grade->name }}
                    @else
                        {{''}}
                    @endif</td>
                <td>@if($employee->rank)
                        {{ $employee->rank->name }}
                    @else
                        {{''}}
                    @endif</td>
                <td>@if($employee->job)
                        {{ $employee->job->name }}
                    @else
                        {{''}}
                    @endif</td>
                <td>@if($employee->role)
                        {{ $employee->role->name }}
                    @else
                        {{''}}
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['admin.employees.destroy', $employee->employee_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admin.employees.show', [$employee->employee_id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admin.employees.edit', [$employee->employee_id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
