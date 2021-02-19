<!-- Periodo Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('periodo_id', __('models/evaluaciones.fields.periodo_id').':') !!}
    <input class="form-control" type="text" value="{{$periodo->nombre}}" readonly>
    <input type="hidden" value="{{$periodo->id}}" name="perido_id">
</div>

<!-- Nivel Id Field -->
    <div class="form-group col-sm-2">
        {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
            <input class="form-control" type="text" value="{{$niveles->descripcion}}" readonly> 
     </div>
    <!-- Grado Id Field -->
 <div class="form-group col-sm-2">
        {!! Form::label('grado_id', __('models/catedras.fields.grado_id').':') !!}
        <input class="form-control" type="text" value="{{$grado->descripcion}}" readonly>
    </div>
<!-- Seccion Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('seccion_id', __('models/catedras.fields.seccion_id').':') !!}
    <input class="form-control" type="text" value="{{$seccion->letra}}" readonly>
</div>
<!-- Curso Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('curso_id', __('models/catedras.fields.curso_id').':') !!}
    <input class="form-control" type="text" value="{{$curso->nombre}}" readonly>
</div>
<!-- Bimestre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bimestre_id', __('models/evaluaciones.fields.bimestre_id').':') !!}
    <input class="form-control" type="text" value="{{$bimestre->nombre}}" readonly>
    <input type="hidden" value="{{$bimestre->id}}" name="bimestre_id">
</div>

<!-- Capacidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_id', __('models/evaluaciones.fields.capacidad_id').':') !!}
    <input class="form-control" type="text" value="{{$capacidad->abreviatura}}" readonly>
    <input type="hidden" value="{{$capacidad->id}}" name="capacidad_id">
</div