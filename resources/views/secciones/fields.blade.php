<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/secciones.fields.periodo_id').':') !!}
    {!! Form::number('periodo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Letra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('letra', __('models/secciones.fields.letra').':') !!}
    {!! Form::text('letra', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrovacantes Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrovacantes', __('models/secciones.fields.nrovacantes').':') !!}
    {!! Form::number('nrovacantes', null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', __('models/secciones.fields.grado_id').':') !!}
    {!! Form::number('grado_id', null, ['class' => 'form-control']) !!}
</div>
