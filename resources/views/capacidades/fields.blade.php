<!-- Nivel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_id', __('models/cursoGrados.fields.nivel_id').':') !!}
    <select name="nivel_id" id="nivel_id" required class="form-control">
        <option value="">Seleccione nivel</option>
        @foreach ($niveles as $nivel)
            <option value="{{$nivel->id}}">{{$nivel->descripcion}}</option>
        @endforeach
    </select>
</div>
<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/capacidades.fields.periodo_id').':') !!}
    {!! Form::label('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
    {!! Form::hidden('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
</div>
<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', __('models/cursoGrados.fields.grado_id').':') !!}
    <select name="grado_id" id="grado_id" required class="form-control">
        <option value="">Seleccione nivel</option>
    </select>
</div>
<!-- Curso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', __('models/cursoGrados.fields.curso_id').':') !!}
    <select name="curso_id" id="curso_id" required class="form-control">
        <option value="">Seleccione nivel</option>
    </select>
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
    {!! Form::hidden('orden2', null, ['class' => 'form-control']) !!}
</div>
