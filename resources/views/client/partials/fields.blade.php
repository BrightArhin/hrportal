

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
                {!! Form::text('kpi_1', null, ['class' => 'form-control', 'required' ,'placeholder'=>'Enter your Kpi']) !!}
            </td>
            <td>
                {!! Form::number('score_1', null, ['class' => 'form-control', 'required' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
            <td>
                {!! Form::number('sup_score_1', null, ['class' => 'form-control', 'disabled' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::text('kpi_2', null, ['class' => 'form-control', 'required' ,'placeholder'=>'Enter your Kpi']) !!}
            </td>
            <td>
                {!! Form::number('score_2', null, ['class' => 'form-control', 'required' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
            <td>
                {!! Form::number('sup_score_2', null, ['class' => 'form-control', 'disabled' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::text('kpi_3', null, ['class' => 'form-control', 'required' ,'placeholder'=>'Enter your Kpi']) !!}
            </td>
            <td>
                {!! Form::number('score_3', null, ['class' => 'form-control', 'required' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
            <td>
                {!! Form::number('sup_score_3', null, ['class' => 'form-control', 'disabled' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::text('kpi_4', null, ['class' => 'form-control', 'required' ,'placeholder'=>'Enter your Kpi']) !!}
            </td>
            <td>
                {!! Form::number('score_4', null, ['class' => 'form-control', 'required' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
            <td>
                {!! Form::number('sup_score_4', null, ['class' => 'form-control', 'disabled' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
        </tr>

        <tr>
            <td>
                {!! Form::text('kpi_5', null, ['class' => 'form-control', 'required' ,'placeholder'=>'Enter your Kpi']) !!}
            </td>
            <td>
                {!! Form::number('score_5', null, ['class' => 'form-control', 'required' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
            <td>
                {!! Form::number('sup_score_5', null, ['class' => 'form-control', 'disabled' ,'step'=>0.1,'min'=>0.0, 'max'=>5.0]) !!}
            </td>
        </tr>

        </tbody>
    </table>






