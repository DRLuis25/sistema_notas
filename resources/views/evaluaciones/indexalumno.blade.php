@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registrar Notas</h1>
                </div>
            </div>
        </div>
    </section>

    
    <div class="content px-3">

        @include('adminlte-templates::common.errors')
    <form action="{{route('guardarnotas')}}" method="POST" >
        @csrf
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('evaluaciones.fieldsregistrar')
                </div>
            </div>

        </div>
    </div>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('evaluaciones.tablealumno')
        </div>
    </div>
    </form>
@endsection
