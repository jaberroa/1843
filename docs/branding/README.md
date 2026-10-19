# Animación de entrada del logotipo

Fuente: 1843-logo-animado-codex.zip suministrado por el propietario.

El encabezado incluye resources/views/partials/brand-logo.blade.php y public/assets/logo-entry.css. El SVG original se conserva en este directorio. La animación se activa por CSS una sola vez en cada carga del documento; los enlaces internos no la reinician. No hay bucles, eventos de scroll ni dependencias añadidas.

Se conservan las 25 barras, geometrías, colores y retrasos del archivo original. Cada barra se anima dentro de un grupo con recorte fijo. Los identificadores están prefijados para evitar colisiones. El componente mantiene las dimensiones de la marca y su título accesible. Con prefers-reduced-motion: reduce se muestra estático desde el primer fotograma.

Verificado en Chrome y en el navegador integrado: 25 barras con opacidad final 1, transformación final identidad, una iteración, pulso desde 1.84 s durante 0.36 s y 25 recortes. Pendiente: verificación específica en Edge y Firefox y prueba visual con la preferencia del sistema de movimiento reducido activada.