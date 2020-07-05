
@foreach($department->kpis as $kpi)
    <div class="form-group col-sm-6">
        {!! Form::label($kpi->id, $kpi->name) !!}
        {!! Form::text('score_'.++$i, null, ['class' => 'form-control', 'required']) !!}
        {!! Form::hidden('kpi_id_'.$i, $kpi->id) !!}
    </div>
@endforeach



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('client.emp_appraise.index') }}" class="btn btn-default">Cancel</a>
</div>
