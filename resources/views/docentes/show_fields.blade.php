<!-- Dni Field -->
<div class="col-sm-12">
    {!! Form::label('dni', __('models/docentes.fields.dni').':') !!}
    <p>{{ $docentes->dni }}</p>
</div>

<!-- Nombres Field -->
<div class="col-sm-12">
    {!! Form::label('nombres', __('models/docentes.fields.nombres').':') !!}
    <p>{{ $docentes->nombres }}</p>
</div>

<!-- Direccion Field -->
<div class="col-sm-12">
    {!! Form::label('direccion', __('models/docentes.fields.direccion').':') !!}
    <p>{{ $docentes->direccion }}</p>
</div>

<!-- Apellidopaterno Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoPaterno', __('models/docentes.fields.apellidoPaterno').':') !!}
    <p>{{ $docentes->apellidoPaterno }}</p>
</div>

<!-- Apellidomaterno Field -->
<div class="col-sm-12">
    {!! Form::label('apellidoMaterno', __('models/docentes.fields.apellidoMaterno').':') !!}
    <p>{{ $docentes->apellidoMaterno }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-12">
    {!! Form::label('email', __('models/docentes.fields.email').':') !!}
    <p>{{ $docentes->email }}</p>
</div>

<!-- Estadocivil Field -->
<div class="col-sm-12">
    {!! Form::label('estadoCivil', __('models/docentes.fields.estadoCivil').':') !!}
    <p>{{ $docentes->estadoCivil }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', __('models/docentes.fields.telefono').':') !!}
    <p>{{ $docentes->telefono }}</p>
</div>

<!-- Segurosocial Field -->
<div class="col-sm-12">
    {!! Form::label('seguroSocial', __('models/docentes.fields.seguroSocial').':') !!}
    <p>{{ $docentes->seguroSocial }}</p>
</div>

<!-- Departamento Id Field -->
<div class="col-sm-12">
    {!! Form::label('departamento_id', __('models/docentes.fields.departamento_id').':') !!}
    <p>{{ $docentes->departamento->nombre }}</p>
</div>

