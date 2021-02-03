<!-- Matricula Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricula_id', __('models/matriculas.fields.matricula_id').':') !!}
    {!! Form::number('matricula_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/matriculas.fields.periodo_id').':') !!}
    {!! Form::number('periodo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Seccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion_id', __('models/matriculas.fields.seccion_id').':') !!}
    {!! Form::number('seccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', __('models/matriculas.fields.observaciones').':') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Exonerado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exonerado', __('models/matriculas.fields.exonerado').':') !!}
    {!! Form::text('exonerado', null, ['class' => 'form-control']) !!}
</div>
