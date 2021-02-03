<!-- Matricula Id Field -->
<div class="col-sm-12">
    {!! Form::label('matricula_id', __('models/evaluaciones.fields.matricula_id').':') !!}
    <p>{{ $evaluaciones->matricula_id }}</p>
</div>

<!-- Periodo Id Field -->
<div class="col-sm-12">
    {!! Form::label('periodo_id', __('models/evaluaciones.fields.periodo_id').':') !!}
    <p>{{ $evaluaciones->periodo_id }}</p>
</div>

<!-- Bimestre Id Field -->
<div class="col-sm-12">
    {!! Form::label('bimestre_id', __('models/evaluaciones.fields.bimestre_id').':') !!}
    <p>{{ $evaluaciones->bimestre_id }}</p>
</div>

<!-- Capacidad Id Field -->
<div class="col-sm-12">
    {!! Form::label('capacidad_id', __('models/evaluaciones.fields.capacidad_id').':') !!}
    <p>{{ $evaluaciones->capacidad_id }}</p>
</div>

<!-- Calificacion Field -->
<div class="col-sm-12">
    {!! Form::label('calificacion', __('models/evaluaciones.fields.calificacion').':') !!}
    <p>{{ $evaluaciones->calificacion }}</p>
</div>

<!-- Observaciones Field -->
<div class="col-sm-12">
    {!! Form::label('observaciones', __('models/evaluaciones.fields.observaciones').':') !!}
    <p>{{ $evaluaciones->observaciones }}</p>
</div>

