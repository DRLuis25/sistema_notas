<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('docente', function (Blueprint $table) {
            $table->id();
            $table->string('dni',8);
            $table->string('nombres');
            $table->string('direccion');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('email')->unique();
            $table->string('estadoCivil');
            $table->string('telefono')->nullable();
            $table->string('seguroSocial',11);
            $table->bigInteger('departamento_id',false,true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('departamento_id', 'docente_has_departamento_ibfk_1')->references('id')->on('departamento');
        });*/
        //No implementado
        Schema::create('catedra_docente', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('periodo_id',false,true);
            $table->bigInteger('docente_id',false,true);
            $table->bigInteger('curso_id',false,true);
            $table->bigInteger('grado_id',false,true);
            $table->bigInteger('seccion_id',false,true);
            $table->string('nrohoras');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('periodo_id', 'catedra_docente_has_periodo_ibfk_1')->references('id')->on('periodo');
            $table->foreign('docente_id', 'catedra_docente_has_docente_ibfk_1')->references('id')->on('users');
            $table->foreign('curso_id', 'catedra_docente_has_curso_ibfk_1')->references('id')->on('curso');
            $table->foreign('grado_id', 'catedra_docente_has_grado_ibfk_1')->references('id')->on('grado');
            $table->foreign('seccion_id', 'catedra_docente_has_seccion_ibfk_1')->references('id')->on('seccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
}
