<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradoDeEstudiosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nivel', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('grado', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->bigInteger('nivel_id',false,true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nivel_id', 'grado_has_nivel_ibfk_1')->references('id')->on('nivel');
        });
        Schema::create('seccion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('periodo_id',false,true);
            $table->string('letra',1);
            $table->integer('nrovacantes');
            $table->bigInteger('grado_id',false,true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('periodo_id', 'seccion_has_periodo_ibfk_1')->references('id')->on('periodo');
            $table->foreign('grado_id', 'seccion_has_grado_ibfk_1')->references('id')->on('grado');
        });
        Schema::create('curso', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->bigInteger('nivel_id',false,true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('nivel_id', 'curso_has_nivel_ibfk_1')->references('id')->on('nivel');
        });
        Schema::create('curso_grado', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('periodo_id',false,true);
            $table->bigInteger('curso_id',false,true);
            $table->bigInteger('grado_id',false,true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('periodo_id', 'curso_grado_has_periodo_ibfk_1')->references('id')->on('periodo');
            $table->foreign('curso_id', 'curso_grado_has_curso_ibfk_1')->references('id')->on('curso');
            $table->foreign('grado_id', 'curso_grado_has_grado_ibfk_2')->references('id')->on('grado');
        });
        //Capacidades
        Schema::create('capacidad', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('periodo_id',false,true);
            $table->bigInteger('curso_id',false,true);
            $table->bigInteger('grado_id',false,true);
            $table->string('asignatura');
            $table->string('abreviatura');
            $table->integer('orden');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('periodo_id', 'capacidad_has_periodo_ibfk_1')->references('id')->on('periodo');
            $table->foreign('curso_id', 'capacidad_has_curso_ibfk_1')->references('curso_id')->on('curso_grado');
            $table->foreign('grado_id', 'capacidad_has_grado_ibfk_2')->references('grado_id')->on('curso_grado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grado_de_estudios_tables');
    }
}
