@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Notas</h1>
                </div>
            </div>
        </div>
    </section>

    
    <div class="content px-3">

        @include('adminlte-templates::common.errors')
    <form action="{{route('evaluaciones.actualizarnotas')}}" method="POST" >
        @csrf
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('evaluaciones.fieldslistar')
                </div>
            </div>

        </div>
    </div>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('evaluaciones.tablealumnoedit')
        </div>
    </div>
    </form>
@endsection
