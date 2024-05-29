<?php
// Directorio donde se guardarán las imágenes de perfil
$directorio_destino = __DIR__ . '/uploads/';

// Obtener información de la imagen
$nombre_temporal = $_FILES['imagen']['tmp_name'];
$nombre_imagen = $_FILES['imagen']['name'];

// Generar un nombre único para la imagen
$nombre_imagen_uniq = uniqid() . '_' . $nombre_imagen;

// Ruta completa donde se guardará la imagen
$ruta_imagen_completa = $directorio_destino . $nombre_imagen_uniq;

// Mover la imagen al directorio destino
if (move_uploaded_file($nombre_temporal, $ruta_imagen_completa)) {
    // La imagen se cargó correctamente
    echo "La imagen se cargó correctamente.";
    // Redirigir al usuario a su perfil
    header("Location: clienteeditarperfil.html");
    exit();
} else {
    // Hubo un error al mover la imagen
    echo "Hubo un error al cargar la imagen.";
}
?>
