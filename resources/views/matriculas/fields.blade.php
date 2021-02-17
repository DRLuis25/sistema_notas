<!-- Periodo Id Field -->
<div class="form-group col-sm-1">
    {!! Form::label('periodo_id', __('models/matriculas.fields.periodo_id').':') !!}
    {!! Form::label('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
    {!! Form::hidden('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
</div>
<!-- Alumno Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('alumno_i', __('models/matriculas.fields.alumno_id').':') !!}
    <select name="alumno_id" id="alumno_id" class="form-control select2 selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="cliente_id" name="cliente_id" data-live-search="true" required>
        <option value="">Seleccione alumno</option>
        @foreach ($alumnos as $item)
            <option value="{{$item->id}}">{{$item->apellidoPaterno." ".$item->apellidoMaterno.", ".$item->nombres}}</option>
        @endforeach
    </select>
</div>

<!-- Matricula Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('matricula_id', __('models/matriculas.fields.matricula_id').':') !!}
    <input type="text" id="matricula_id2" name="matricula_id2" disabled class="form-control">
    {!! Form::hidden('matricula_id',null, ['class' => 'form-control']) !!}
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
<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', __('models/matriculas.fields.observaciones').' (Opcional):') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Exonerado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exonerado','Curso '. __('models/matriculas.fields.exonerado').':') !!}
    <select id="exonerado" name="exonerado[]" class="form-control" multiple="">
    </select>
</div>
