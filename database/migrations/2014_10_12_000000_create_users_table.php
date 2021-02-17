<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('dni',8);
            $table->string('direccion');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('estadoCivil');
            $table->string('telefono')->nullable();
            $table->string('seguroSocial',11);
            $table->bigInteger('departamento_id',false,true);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('departamento_id', 'docente_has_departamento_ibfk_1')->references('id')->on('departamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
