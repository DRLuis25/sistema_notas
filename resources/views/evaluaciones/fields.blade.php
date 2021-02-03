<!-- Matricula Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricula_id', __('models/evaluaciones.fields.matricula_id').':') !!}
    {!! Form::number('matricula_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/evaluaciones.fields.periodo_id').':') !!}
    {!! Form::number('periodo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bimestre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bimestre_id', __('models/evaluaciones.fields.bimestre_id').':') !!}
    {!! Form::number('bimestre_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_id', __('models/evaluaciones.fields.capacidad_id').':') !!}
    {!! Form::number('capacidad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Calificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('calificacion', __('models/evaluaciones.fields.calificacion').':') !!}
    {!! Form::number('calificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', __('models/evaluaciones.fields.observaciones').':') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>
