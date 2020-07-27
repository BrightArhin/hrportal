
<h2 style=" margin-top :10px; align-self: flex-start">EVALUATION OF KEY RESULT AREAS/DUTIES</h2>
<table class="table borderless">
    <thead>
    <tr>
        <th>Key Result Areas(KRA)</th>
        <th>Appraisee</th>
        <th>Appraiser</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            {{$employeescores->kpi_1}}
        </td>
        <td>
           {{$employeescores->score_1}}
        </td>
        <td>
            {!! Form::number('score_1', null, ['class' => 'form-control', 'required' ,'min'=>0, 'max'=>5, "id"=>"score_1"]) !!}
        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_2}}
        </td>
        <td>
            {{$employeescores->score_2}}
        </td>
        <td>
            {!! Form::number('score_2', null, ['class' => 'form-control', 'required' ,'min'=>0, 'max'=>5,"id"=>"score_2"]) !!}
        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_3}}
        </td>
        <td>
            {{$employeescores->score_3}}
        </td>
        <td>
            {!! Form::number('score_3', null, ['class' => 'form-control', 'required' ,'min'=>0, 'max'=>5,"id"=>"score_3"]) !!}
        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_1}}
        </td>
        <td>
            {{$employeescores->score_1}}
        </td>
        <td>
            {!! Form::number('score_4', null, ['class' => 'form-control', 'required' ,'min'=>0, 'max'=>5,"id"=>"score_4"]) !!}
        </td>
    </tr>

    <tr>
        <td>
            {{$employeescores->kpi_1}}
        </td>
        <td>
            {{$employeescores->score_1}}
        </td>
        <td>
            {!! Form::number('score_5', null, ['class' => 'form-control', 'required' ,'min'=>0, 'max'=>5 ,"id"=>"score_5"]) !!}
            {!! Form::hidden('appraisal_id', $appraisal_id) !!}
        </td>
    </tr>

    </tbody>
</table>





