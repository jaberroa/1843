# Verificación de la primera versión

Fecha: 19 de octubre de 2026.

## Completado
- Laravel 12.70.0 instalado; página responde HTTP 200 en `http://127.0.0.1:1843`.
- Migraciones ejecutadas correctamente en la base MySQL local `1843`, inicialmente vacía.
- Siete pruebas automatizadas aprobadas, 25 aserciones. Incluyen cinco pruebas de contacto: renderizado, almacenamiento, validación, antispam y fallo de base de datos. Las pruebas usan SQLite en memoria.
- Sintaxis PHP y JavaScript comprobada.
- SVG original copiado sin alteraciones; Inter y licencia locales.
- Enlaces internos y selector de interés conectados a secciones y opciones existentes.

## Pendiente de comprobación
- Revisión visual del sitio y pruebas de navegación/interacción en navegador: el navegador integrado agotó el tiempo de apertura dos veces. No se obtuvo captura del sitio.
- Comprobar reflujo a 320 px, tableta y escritorio, foco, menú móvil, diálogos y ausencia de errores de consola. Las reglas responsive están implementadas; su presencia no equivale a verificación visual.
- Auditoría WCAG 2.2 AA y mediciones LCP, INP y CLS en el alojamiento final. No se afirma certificación ni cumplimiento medido.
- Ejecutar las pruebas con PHP 8.3. El PHP local disponible es 8.2.12.
- Confirmar destinatario y proceso comercial si se quiere añadir correo automático; actualmente el formulario almacena las consultas en MySQL.
- Completar datos legales y empresariales reales antes de publicación.

No se publicó el sitio en un servidor externo. Laravel/PHP/MySQL requiere un alojamiento compatible.
