<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', __('models/cursos.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivel_id', __('models/cursos.fields.nivel_id').':') !!}
    <select class="form-control" name='nivel_id' value="" required>
        <option value="">Seleccione nivel</option>
        @foreach ($niveles as $nivel)
            <option value="{{$nivel->id}}">{{$nivel->descripcion}}</option>
        @endforeach
    </select>
</div>
