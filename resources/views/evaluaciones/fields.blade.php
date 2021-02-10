<!-- Periodo Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('periodo_id', __('models/evaluaciones.fields.periodo_id').':') !!}
    {!! Form::label('2021', null, ['class' => 'form-control']) !!}
</div>
<!-- Nivel Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
    <select name="nivel_id" id="nivel_id" required class="form-control">
        <option value="">Seleccione nivel</option>
        @foreach ($niveles as $nivel)
            <option value="{{$nivel->id}}">{{$nivel->descripcion}}</option>
        @endforeach
    </select>
</div>
<!-- Grado Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('grado_id', __('models/catedras.fields.grado_id').':') !!}
    <select name="grado_id" id="grado_id" required class="form-control">
        <option value="">Seleccione nivel</option>
    </select>
</div>
<!-- Seccion Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('seccion_id', __('models/catedras.fields.seccion_id').':') !!}
    <select name="seccion_id" id="seccion_id" required class="form-control">
        <option value="">Seleccione grado</option>
    </select>
</div>
<!-- Curso Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('curso_id', __('models/catedras.fields.curso_id').':') !!}
    <select name="curso_id" id="curso_id" required class="form-control">
        <option value="">Seleccione nivel</option>
    </select>
</div>



<!-- Capacidad Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidad_id', __('models/evaluaciones.fields.capacidad_id').':') !!}
    {!! Form::number('capacidad_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bimestre Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bimestre_id', __('models/evaluaciones.fields.bimestre_id').':') !!}
    {!! Form::number('bimestre_id', null, ['class' => 'form-control']) !!}
</div>
<div class="">
    <!-- Calificacion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('calificacion', __('models/evaluaciones.fields.calificacion').':') !!}
        {!! Form::number('calificacion', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Calificacion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('calificacion', __('models/evaluaciones.fields.calificacion').':') !!}
        {!! Form::number('calificacion', null, ['class' => 'form-control']) !!}
    </div>

</div>
