@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('models/alumnos.singular')</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($alumnos, ['route' => ['alumnos.update', $alumnos->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('alumnos.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('alumnos.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
