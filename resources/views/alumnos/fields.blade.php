<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', __('models/alumnos.fields.dni').':') !!}
    {!! Form::text('dni', null, ['class' => 'form-control','onkeypress'=>'return event.charCode >= 48 && event.charCode <= 57']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', __('models/alumnos.fields.nombres').':') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Otrosnombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('otrosNombres', __('models/alumnos.fields.otrosNombres').':') !!}
    {!! Form::text('otrosNombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidopaterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoPaterno', __('models/alumnos.fields.apellidoPaterno').':') !!}
    {!! Form::text('apellidoPaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidomaterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidoMaterno', __('models/alumnos.fields.apellidoMaterno').':') !!}
    {!! Form::text('apellidoMaterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/alumnos.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
