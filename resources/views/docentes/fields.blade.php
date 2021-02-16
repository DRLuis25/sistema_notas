<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', __('models/docentes.fields.dni').':') !!}
    {!! Form::text('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', __('models/docentes.fields.nombres').':') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', __('models/docentes.fields.direccion').':') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidopaterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoPaterno', __('models/docentes.fields.apellidoPaterno').':') !!}
    {!! Form::text('apellidoPaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidomaterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoMaterno', __('models/docentes.fields.apellidoMaterno').':') !!}
    {!! Form::text('apellidoMaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/docentes.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadocivil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadoCivil', __('models/docentes.fields.estadoCivil').':') !!}
    <select name="estadoCivil" id="estadoCivil" required class="form-control">
        <option value="">Seleccione una opción</option>
        <option value="Soltero">Soltero</option>
        <option value="Casado">Casado</option>
    </select>
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono', __('models/docentes.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<!-- Segurosocial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seguroSocial', __('models/docentes.fields.seguroSocial').':') !!}
    {!! Form::number('seguroSocial', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departamento', __('models/docentes.fields.departamento_id').':') !!}
    <select class="form-control" name='departamento_id' value="" required>
        <option value="">Seleccione departamento</option>
        @foreach ($departamentos as $departamento)
        <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
        @endforeach
    </select>
</div>


<!-- Rol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', __('models/docentes.fields.role').':') !!}
    <select name="role" id="role" class="form-control" required >
        <option value="">Seleccione un rol</option>
        @foreach ($roles as $item)
            <option value="{{$item->name}}" @isset($usuarios)
            @if (implode(" ",$usuarios->getRoleNames()->toArray())==$item->name){{'selected'}}             
            @endif @endisset >{{$item->name}}</option>
        @endforeach
    </select>
</div>
