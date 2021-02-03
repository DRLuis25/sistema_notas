<!-- Matricula Id Field -->
<div class="col-sm-12">
    {!! Form::label('matricula_id', __('models/matriculas.fields.matricula_id').':') !!}
    <p>{{ $matriculas->matricula_id }}</p>
</div>

<!-- Periodo Id Field -->
<div class="col-sm-12">
    {!! Form::label('periodo_id', __('models/matriculas.fields.periodo_id').':') !!}
    <p>{{ $matriculas->periodo_id }}</p>
</div>

<!-- Seccion Id Field -->
<div class="col-sm-12">
    {!! Form::label('seccion_id', __('models/matriculas.fields.seccion_id').':') !!}
    <p>{{ $matriculas->seccion_id }}</p>
</div>

<!-- Observaciones Field -->
<div class="col-sm-12">
    {!! Form::label('observaciones', __('models/matriculas.fields.observaciones').':') !!}
    <p>{{ $matriculas->observaciones }}</p>
</div>

<!-- Exonerado Field -->
<div class="col-sm-12">
    {!! Form::label('exonerado', __('models/matriculas.fields.exonerado').':') !!}
    <p>{{ $matriculas->exonerado }}</p>
</div>

