<!-- Dni Field -->
<div class="col-sm-12">
    {!! Form::label('dni', __('models/alumnos.fields.dni').':') !!}
    <p>{{ $alumnos->dni }}</p>
</div>

<!-- Nombres Field -->
<div class="col-sm-12">
    {!! Form::label('nombres', __('models/alumnos.fields.nombres').':') !!}
    <p>{{ $alumnos->nombres }}</p>
</div>

<!-- Otrosnombres Field -->
<div class="col-sm-12">
    {!! Form::label('otrosNombres', __('models/alumnos.fields.otrosNombres').':') !!}
    <p>{{ $alumnos->otrosNombres }}</p>
</div>

<!-- Apellidopaterno Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoPaterno', __('models/alumnos.fields.apellidoPaterno').':') !!}
    <p>{{ $alumnos->apellidoPaterno }}</p>
</div>

<!-- Apellidomaterno Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoMaterno', __('models/alumnos.fields.apellidoMaterno').':') !!}
    <p>{{ $alumnos->apellidoMaterno }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', __('models/alumnos.fields.email').':') !!}
    <p>{{ $alumnos->email }}</p>
</div>

