<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/cursoGrados.fields.periodo_id').':') !!}
    {!! Form::number('periodo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Curso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', __('models/cursoGrados.fields.curso_id').':') !!}
    {!! Form::number('curso_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', __('models/cursoGrados.fields.grado_id').':') !!}
    {!! Form::number('grado_id', null, ['class' => 'form-control']) !!}
</div>
