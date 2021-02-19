
# Sistema de Notas para una escuela

Opciones
 - Registro
    - Usuarios
    - Alumnos
    - Docentes
    - Notas
 - Reportes

# Laravel Boilerplate for AdminLTE Theme

Laravel Boilerplate with [AdminLTE](https://adminlte.io/) Theme with [InfyOm Laravel Generator](https://github.com/InfyOmLabs/laravel-generator).
Following things are ready to be used directly with AdminLTE Theme.

- Signup
- Login
- Forgot Password
- Password Reset
- Home Layout with Sidebar

## Paquetes instalados

- InfyOm Laravel Generator
- AdminLTE Templates
- Laravel UI
- Laravel Collective


Instalación

Comandos:

    git clone https://github.com/DRLuis25/sistema_notas
    cd sistema_notas
    composer install
    renombrar .env.example a .env y configurar la base de datos
    php artisan key:generate
    php artisan migrate:fresh --seed
    php artisan serve

En caso de error ejecutar:

    php artisan config:cache
