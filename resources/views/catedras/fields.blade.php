<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/cursoGrados.fields.periodo_id').':') !!}
    {!! Form::label('periodo_id', $periodo->nombre, ['class' => 'form-control']) !!}
    {!! Form::hidden('periodo_id', $periodo->id, ['class' => 'form-control']) !!}
</div>

<!-- Docente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('docente_id', __('models/catedras.fields.docente_id').':') !!}
    
    <select name="docente_id" id="docente_id" class="form-control select2 selectpicker"  style="width: 100%;" data-select2-id="2" tabindex="-1" aria-hidden="true" id="cliente_id" name="cliente_id" data-live-search="true" required>
        <option value="">Seleccione docente</option>
        @foreach ($docentes as $docente)
            <option value="{{$docente->id}}">{{ $docente->apellidoPaterno }} {{ $docente->apellidoMaterno }}, {{ $docente->name }}</option>
        @endforeach
    </select>
</div>
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
<!-- Curso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', __('models/catedras.fields.curso_id').':') !!}
    <select name="curso_id" id="curso_id" required class="form-control">
        <option value="">Seleccione nivel</option>
    </select>
</div>
<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', __('models/catedras.fields.grado_id').':') !!}
    <select name="grado_id" id="grado_id" required class="form-control">
        <option value="">Seleccione nivel</option>
    </select>
</div>

<!-- Seccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion_id', __('models/catedras.fields.seccion_id').':') !!}
    <select name="seccion_id" id="seccion_id" required class="form-control">
        <option value="">Seleccione grado</option>
    </select>
</div>
<!-- Nrohoras Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrohoras', __('models/catedras.fields.nrohoras').':') !!}
    {!! Form::time('nrohoras', null, ['class' => 'form-control','id'=>'nrohoras','min'=>'01:00', 'max'=>'8:00']) !!}
</div>


