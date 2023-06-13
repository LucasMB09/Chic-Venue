<?php
function borrar_tarjeta($num_cliente, $tarjeta) {
    // Establecer los detalles de conexión a la base de datos
    $host = 'localhost:3306';
    $usuario = 'root';
    $contrasena = '';
    $nombre_base_datos = 'chicvenue';

    // Crear una conexión a la base de datos
    $conexion = mysqli_connect($host, $usuario, $contrasena, $nombre_base_datos);

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
    }

    // Escapar los valores para prevenir inyección de SQL
    $num_cliente = mysqli_real_escape_string($conexion, $num_cliente);
    $tarjeta = mysqli_real_escape_string($conexion, $tarjeta);

    // Construir la consulta SQL para eliminar la tarjeta
    $query_eliminar = "DELETE FROM tarjeta_bancaria WHERE id_cliente = '$num_cliente' AND numero_tarjeta = '$tarjeta'";

    // Ejecutar la consulta
    $resultado_eliminar = mysqli_query($conexion, $query_eliminar);

    // Verificar si la eliminación fue exitosa
    if ($resultado_eliminar) {
        echo "La tarjeta se eliminó correctamente.";
    } else {
        echo "Error al eliminar la tarjeta: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>