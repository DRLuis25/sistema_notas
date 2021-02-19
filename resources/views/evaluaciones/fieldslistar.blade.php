<!-- Periodo Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('periodo_id', __('models/evaluaciones.fields.periodo_id').':') !!}
    <input class="form-control" type="text" value="{{$evaluaciones[0]->periodo->nombre}}" readonly>
    <input type="hidden" name="periodo_id" value="{{$evaluaciones[0]->periodo->id}}">
</div>

<!-- Nivel Id Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
            <input class="form-control" type="text" value="{{$evaluaciones[0]->capacidad->grado->nivel->descripcion}}" readonly> 
     </div>
    <!-- Grado Id Field -->
 <div class="form-group col-sm-2">
        {!! Form::label('grado_id', __('models/catedras.fields.grado_id').':') !!}
        <input class="form-control" type="text" value="{{$evaluaciones[0]->capacidad->grado->descripcion}}" readonly>
    </div>
<!-- Seccion Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('seccion_id', __('models/catedras.fields.seccion_id').':') !!}
    <input class="form-control" type="text" value="{{$evaluaciones[0]->matriculadetalle->seccion->letra}}" readonly>
</div>
<!-- Curso Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('curso_id', __('models/catedras.fields.curso_id').':') !!}
    <input class="form-control" type="text" value="{{$evaluaciones[0]->capacidad->curso->nombre}}" readonly>
</div>
<!-- Bimestre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bimestre_id', __('models/evaluaciones.fields.bimestre_id').':') !!}
    <input class="form-control" type="text" value="{{$evaluaciones[0]->bimestre->nombre}}" readonly>
    <input type="hidden" name="bimestre_id" value="{{$evaluaciones[0]->bimestre->id}}">
</div>

<!-- Capacidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_id', __('models/evaluaciones.fields.capacidad_id').':') !!}
    <input class="form-control" type="text" value="{{$evaluaciones[0]->capacidad->asignatura}}"  readonly>
    <input type="hidden" name="capacidad_id" value="{{$evaluaciones[0]->capacidad->id}}">
</div