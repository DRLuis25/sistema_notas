<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/capacidades.fields.periodo_id').':') !!}
    {!! Form::number('periodo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Curso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', __('models/capacidades.fields.curso_id').':') !!}
    {!! Form::number('curso_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', __('models/capacidades.fields.grado_id').':') !!}
    {!! Form::number('grado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Asignatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asignatura', __('models/capacidades.fields.asignatura').':') !!}
    {!! Form::text('asignatura', null, ['class' => 'form-control']) !!}
</div>

<!-- Abreviatura Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abreviatura', __('models/capacidades.fields.abreviatura').':') !!}
    {!! Form::text('abreviatura', null, ['class' => 'form-control']) !!}
</div>

<!-- Orden Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orden', __('models/capacidades.fields.orden').':') !!}
    {!! Form::number('orden', null, ['class' => 'form-control']) !!}
</div>
