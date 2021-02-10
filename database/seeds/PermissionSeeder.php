<?php

use App\Models\Alumnos;
use App\Models\Bimestres;
use App\Models\Capacidades;
use App\Models\Catedra;
use App\Models\CursoGrado;
use App\Models\Cursos;
use App\Models\Departamentos;
use App\Models\Docentes;
use App\Models\Evaluaciones;
use App\Models\Grados;
use App\Models\MatriculaMaestro;
use App\Models\Matriculas;
use App\Models\Niveles;
use App\Models\Periodos;
use App\Models\Secciones;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Bimestres

        $primerBimestre=Bimestres::create([
            'nombre'=>'Primer Bimestre'
        ]);
        $segundoBimestre=Bimestres::create([
            'nombre'=>'Segundo Bimestre'
        ]);
        $tercerBimestre=Bimestres::create([
            'nombre'=>'Tercer Bimestre'
        ]);
        $cuartoBimestre=Bimestres::create([
            'nombre'=>'Cuarto Bimestre'
        ]);
        //Crear niveles
        $primaria=Niveles::create([
            'descripcion'=>'Primaria',
        ]);
        $secundaria=Niveles::create([
            'descripcion'=>'Secundaria',
        ]);

        //Departamentos
        $primaria=Departamentos::create([
            'nombre'=>'Personal Docente Primaria',
        ]);
        $secundaria=Departamentos::create([
            'nombre'=>'Personal Docente Secundaria',
        ]);

        //Cursos
        //Primaria
        $cursoComunicacion = Cursos::create([
            'nombre'=>'Comunicación',
            'nivel_id'=>$primaria->id
        ]);
        $cursoArte = Cursos::create([
            'nombre'=>'Arte',
            'nivel_id'=>$primaria->id
        ]);
        $cursoMatematica = Cursos::create([
            'nombre'=>'Matematica',
            'nivel_id'=>$primaria->id
        ]);
        //Secundaria
        $cursoHistoria = Cursos::create([
            'nombre'=>'Historia',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoEducacionReligiosa = Cursos::create([
            'nombre'=>'Educación Religiosa',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoMatematicas = Cursos::create([
            'nombre'=>'Matematica',
            'nivel_id'=>$secundaria->id
        ]);
        $cursoPFRH = Cursos::create([
            'nombre'=>'Persona Familia y Relaciones Humanas',
            'nivel_id'=>$secundaria->id
        ]);
        //Docentes
        factory(Docentes::class,20)->create();
        //Alumnos
        factory(Alumnos::class,20)->create();
        
        //Grados
        //Primaria
        $primerGradoPrimaria = Grados::create([
            'descripcion'=>'Primero',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        $segundoGradoPrimaria = Grados::create([
            'descripcion'=>'Segundo',
            'nivel_id'=>$primaria->id //Primaria
        ]);
        //Secundaria
        $primerGradoSecundaria = Grados::create([
            'descripcion'=>'Primero',
            'nivel_id'=>$secundaria->id //Secundaria
        ]);
        //Periodo 2021
        $periodo = Periodos::create([
            'nombre'=>'2021'
        ]);

        //Relacionar Curso-Grado
        $cursoComunicacionPrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacion->id,         //Comunicación
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $cursoArtePrimerGradoPrimaria= CursoGrado::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoArte->id,                 //Arte
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        
        //Crear Secciones para los grados

        $primeroPrimariaSeccionA=Secciones::create([
            'periodo_id'=>$periodo->id,
            'letra'=>'A',
            'nrovacantes'=>'30',
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);
        $primeroPrimariaSeccionB=Secciones::create([
            'periodo_id'=>$periodo->id,
            'letra'=>'B',
            'nrovacantes'=>'20',
            'grado_id'=>$primerGradoPrimaria->id        //primerGradoPrimaria
        ]);

        //Registrar Cátedras de docentes

        $catedraDocente1=Catedra::create([
            'periodo_id'=>$periodo->id,
            'docente_id'=>'1',                                                  //Del 1 al 20 (Hay 20 docentes)
            'curso_id'=>$cursoComunicacionPrimerGradoPrimaria->curso_id,        //Comunicación
            'grado_id'=>$cursoComunicacionPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
            'seccion_id'=>$primeroPrimariaSeccionA->id,                         //Seccion A
            'nrohoras'=>'3:00:00'
        ]);

        //Asignar Capacidades a CursoGrado

        $capacidad1CursoComunicacionPrimerGradoPrimaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacionPrimerGradoPrimaria->curso_id,        //Comunicación
            'grado_id'=>$cursoComunicacionPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
            'asignatura'=>'Infiere e interpreta información del texto oral',
            'abreviatura'=>'Inf. e Interp. texto oral',
            'orden'=>'1'
        ]);

        $capacidad2CursoComunicacionPrimerGradoPrimaria=Capacidades::create([
            'periodo_id'=>$periodo->id,
            'curso_id'=>$cursoComunicacionPrimerGradoPrimaria->curso_id,        //Comunicación
            'grado_id'=>$cursoComunicacionPrimerGradoPrimaria->grado_id,        //primerGradoPrimaria
            'asignatura'=>'Adecúa, organiza y desarrolla las ideas de forma coherente y cohesionada',
            'abreviatura'=>'Adec. org. y des. ideas',
            'orden'=>'2'
        ]);

        //Matrícula única inicial

        $matriculaInicialAlumno1=MatriculaMaestro::create([
            'nromatricula'=>'1234567821',
            'alumno_id'=>'1'
        ]);


        //Registrar Matrículas (Detalle)

        $matricula1Alumno1=Matriculas::create([
            'matricula_id'=>$matriculaInicialAlumno1->id,
            'periodo_id'=>$periodo->id,
            'seccion_id'=>$primeroPrimariaSeccionA->id,
            'observaciones'=>null,
            'exonerado'=>'0'
        ]);

        //Registrar Evaluaciones alumno

        $evaluacionCapacidad1Matricula1Alumno1=Evaluaciones::create([
            'matricula_id'=>$matricula1Alumno1->matricula_id,
            'periodo_id'=>$periodo->id,
            'bimestre_id'=>$primerBimestre->id,
            'capacidad_id'=>$capacidad1CursoComunicacionPrimerGradoPrimaria->id,
            'calificacion'=>'20',
            'observaciones'=>null
        ]);

        $evaluacionCapacidad2Matricula1Alumno1=Evaluaciones::create([
            'matricula_id'=>$matricula1Alumno1->matricula_id,
            'periodo_id'=>$periodo->id,
            'bimestre_id'=>$primerBimestre->id,
            'capacidad_id'=>$capacidad2CursoComunicacionPrimerGradoPrimaria->id,
            'calificacion'=>'15',
            'observaciones'=>null
        ]);

        //Usuarios del sistema

        //User temp
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>'$2y$10$cuf37o9lN0IkRFv73Q7IB.c5bDqCvog845XuTKHxSbMep/D04mknG' //password
        ]);
        
    }
}
