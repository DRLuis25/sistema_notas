<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', __('models/cursos.fields.nombre').':') !!}
    <p>{{ $cursos->nombre }}</p>
</div>

<!-- Nivel Id Field -->
<div class="col-sm-12">
    {!! Form::label('nivel_id', __('models/cursos.fields.nivel_id').':') !!}
    <p>{{ $cursos->nivel_id }}</p>
</div>

