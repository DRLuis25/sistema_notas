<!-- Periodo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('periodo_id', __('models/catedras.fields.periodo_id').':') !!}
    {!! Form::number('periodo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Docente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('docente_id', __('models/catedras.fields.docente_id').':') !!}
    {!! Form::number('docente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Curso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', __('models/catedras.fields.curso_id').':') !!}
    {!! Form::number('curso_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', __('models/catedras.fields.grado_id').':') !!}
    {!! Form::number('grado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Seccion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion_id', __('models/catedras.fields.seccion_id').':') !!}
    {!! Form::number('seccion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nrohoras Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nrohoras', __('models/catedras.fields.nrohoras').':') !!}
    {!! Form::date('nrohoras', null, ['class' => 'form-control','id'=>'nrohoras']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#nrohoras').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush
