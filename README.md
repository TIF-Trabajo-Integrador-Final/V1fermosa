# Portal Web FERMOSA

Este proyecto es el portal web institucional del Instituto Superior FERMOSA, construido sobre el framework Laravel para ofrecer una plataforma robusta y escalable. 
## Su principal objetivo es gestionar la **Oferta Educativa**, las **Sedes**, los **Convenios** y el **Proceso de Inscripción** en línea.

##Funcionalidades Principales

* **Páginas Informativas:** Home, Institución (Misión, Visión, Historia), Sedes.
* **Oferta Educativa:** Listado y detalle de todas las Carreras.
* **Inscripción Online:** Un formulario que captura las solicitudes de pre-inscripción y las almacena en la base de datos (`solicitudes_inscripcion`).
* **Convenios:** Muestra las Universidades y Centros de Estudio asociados.

## Configuración y Desarrollo

### 1. Requisitos

* PHP (8.1 o superior)
* Composer
* Base de datos (MySQL, PostgreSQL, etc.)

### 2. Instalación

1.  Clonar el repositorio.
2.  Instalar dependencias de PHP:
    ```bash
    composer install
    ```
3.  Crear y configurar el archivo de entorno `.env` con los detalles de la base de datos.
4.  Generar la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```
5.  Compilar assets de frontend (CSS/JS) si se utiliza Vite/npm:
    ```bash
    npm install
    npm run dev
    ```

### 3. Base de Datos y Datos Iniciales (Crucial)

Hemos configurado la aplicación para cargar Carreras y Convenios automáticamente usando *Seeders*.

Para iniciar la base de datos y cargar los datos de las carreras y convenios:

```bash
php artisan migrate:fresh --seed

## Este comando:

## Elimina todas las tablas.

Ejecuta las migraciones (carreras, solicitudes_inscripcion, convenios, etc.).

Ejecuta los seeders (CarreraSeeder, ConvenioSeeder) para poblar las tablas con datos reales.

## Ejecución del Servidor:
Inicia el servidor de desarrollo de Laravel:

**php artisan serve**

## Accede a la aplicación en http://127.0.0.1:8000.

Estructura de Rutas Implementadas

URL        ---           Ruta Nombrada     ---     Controlador          ---       Descripción
/                            home               WebController@index             Página principal.
/inscripcion (GET)       inscripcion          InscripcionController@index       Muestra formulario de pre-inscripción.
/inscripcion (POST)    inscripcion.store     InscripcionController@store        Guarda la solicitud en DB.
/sedes                    sedes.index          SedeController@index             Listado de sedes con mapas e info.
/convenios              convenios.index      ConvenioController@index           Listado de Universidades con convenio.
/carreras                carreras.index       CarreraController@index           Listado general de la oferta.
/carreras/{slug}          carreras.show       CarreraController@show            Detalle de una carrera específica.
