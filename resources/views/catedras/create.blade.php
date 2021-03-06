@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/catedras.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'catedras.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('catedras.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('catedras.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
@section('script')
<script>

    $("#nivel_id").change(event => {
        $.get(`/getCursos/${event.target.value}`, function(res, sta){
            console.log(res);
            console.log(sta);
            $("#curso_id").empty();
            $("#curso_id").append(`<option value=''> Seleccione curso </option>`);
            res.forEach(element => {
                $("#curso_id").append(`<option value=${element.id}> ${element.nombre} </option>`);
            });
        });
        $.get(`/getGrados/${event.target.value}`, function(res, sta){
            $("#grado_id").empty();
            $("#grado_id").append(`<option value=''> Seleccione grado </option>`);
            res.forEach(element => {
                $("#grado_id").append(`<option value=${element.id}> ${element.descripcion} </option>`);
            });
        });
        $("#seccion_id").empty();
        $("#seccion_id").append(`<option value=''> Seleccione grado </option>`);
    });
    $("#grado_id").change(event => {
        $.get(`/getSecciones/${event.target.value}`, function(res, sta){
            $("#seccion_id").empty();
            $("#seccion_id").append(`<option value=''> Seleccione sección </option>`);
            res.forEach(element => {
                $("#seccion_id").append(`<option value=${element.id}> ${element.letra} </option>`);
            });
        });
    });
</script>
@endsection