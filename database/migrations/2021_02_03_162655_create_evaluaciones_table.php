<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bimestre
        Schema::create('bimestre', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
        
        //Matricula
        Schema::create('matricula', function (Blueprint $table) {
            $table->id();
            $table->string('nromatricula',10);
            $table->bigInteger('alumno_id',false,true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('alumno_id', 'matricula_has_alumno_ibfk_1')->references('id')->on('alumno');
        });
        
        //Matricula Detalle
        Schema::create('matricula_detalle', function (Blueprint $table) {
            $table->bigInteger('matricula_id',false,true);
            $table->bigInteger('periodo_id',false,true);
            $table->bigInteger('seccion_id',false,true);
            $table->string('observaciones')->nullable();
            $table->string('exonerado',1)->default('0');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['matricula_id','periodo_id']);
            $table->foreign('matricula_id', 'matricula_detalle_has_alumno_ibfk_1')->references('id')->on('matricula');
            $table->foreign('periodo_id', 'matricula_detalle_has_periodo_ibfk_1')->references('id')->on('periodo');
            $table->foreign('seccion_id', 'matricula_detalle_has_seccion_ibfk_1')->references('id')->on('seccion');
        });
        //Exonerado
        Schema::create('exonerado', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matricula_id',false,true);
            $table->bigInteger('periodo_id',false,true);
            $table->bigInteger('curso_id',false,true);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['matricula_id','periodo_id','curso_id'],'exonerado_unique');
            $table->foreign('matricula_id', 'exonerado_has_matricula_ibfk_1')->references('matricula_id')->on('matricula_detalle');
            $table->foreign('periodo_id', 'exonerado_has_periodo_ibfk_1')->references('id')->on('periodo');
            $table->foreign('curso_id', 'exonerado_has_curso_ibfk_1')->references('id')->on('curso');
        });
        //Evaluacion
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matricula_id',false,true);
            $table->bigInteger('periodo_id',false,true);
            $table->bigInteger('bimestre_id',false,true);
            $table->bigInteger('capacidad_id',false,true);
            $table->integer('calificacion');
            $table->string('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['matricula_id','periodo_id','bimestre_id','capacidad_id'],'evaluacion_unique');
            $table->foreign('matricula_id', 'evaluacion_has_matricula_ibfk_1')->references('matricula_id')->on('matricula_detalle');
            $table->foreign('periodo_id', 'evaluacion_has_periodo_ibfk_1')->references('id')->on('periodo');
            $table->foreign('bimestre_id', 'evaluacion_has_bimestre_ibfk_1')->references('id')->on('bimestre');
            $table->foreign('capacidad_id', 'evaluacion_has_capacidad_ibfk_1')->references('id')->on('capacidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
}
