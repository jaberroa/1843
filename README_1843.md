# 1843 Intelligent Systems

Sitio corporativo en Laravel 12. La especificación principal está en `docs/UX_UI_1843.md`. Código de interfaz en `resources/views/home.blade.php` y recursos locales en `public/assets/`. El SVG de origen se conserva sin editar en `public/assets/logo.svg`.

## Entorno

Destino: PHP 8.3 y MySQL, base `1843`. El equipo actual tiene PHP 8.2.12, compatible con Laravel 12; la comprobación con PHP 8.3 debe realizarse antes del despliegue. No se ha cambiado la instalación PHP del equipo.

1. Instalar dependencias: `composer install`.
2. Copiar `.env.example` a `.env` y configurar credenciales MySQL propias. La configuración local usa el servicio MySQL de desarrollo del equipo.
3. Ejecutar `php artisan key:generate` y `php artisan migrate`.
4. Iniciar `php artisan serve --host=127.0.0.1 --port=1843`.
5. Abrir `http://127.0.0.1:1843`.

No es necesario compilar JavaScript. Inter y su licencia se sirven localmente. Para producción, usar PHP 8.3, `APP_ENV=production`, `APP_DEBUG=false`, HTTPS, un usuario MySQL con privilegios limitados y un document root que apunte exclusivamente a `public/`. Conservar `.env` fuera del control de versiones.

## Contacto

El formulario guarda solicitudes en `contact_requests`, con validación, CSRF, consentimiento, campo antispam y límite de cinco peticiones por minuto. No envía correo ni afirma haberlo enviado. Si falla el almacenamiento, devuelve un mensaje de error y conserva los valores introducidos.

Para revisar solicitudes en un entorno de confianza: `php artisan tinker`, y después `DB::table('contact_requests')->latest('id')->get();`. No hay panel público ni ruta que exponga solicitudes. Antes de producción, definir el responsable del seguimiento comercial, retención de datos y texto legal aplicable. Los datos empresariales no suministrados no se han inventado.

## Validación

`php artisan test` utiliza SQLite en memoria, sin modificar MySQL. Incluye página, persistencia, datos inválidos, antispam y error de almacenamiento. Las pruebas no sustituyen mediciones WCAG/Core Web Vitals en el alojamiento final.

El logo seleccionado entre los archivos suministrados es `1843_white_blue.svg`. Los textos de productos son introductorios; las prestaciones y dominios oficiales deben ampliarse con información aprobada.

## Decisión de alojamiento

El proyecto se conserva localmente: el alojamiento Sites ejecuta Workers y no puede ejecutar este stack PHP/MySQL. No se creó ni publicó una versión alternativa con otro framework.
